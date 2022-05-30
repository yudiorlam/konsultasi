<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function fetch_conv(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::user()->id;
            if (auth()->user()->role == 1) {
                $data = Conversation::join('users', 'users.id', '=', 'conversations.user_id')
                    ->select('conversations.id as conv_id', 'conversations.tiket_status', 'users.id', 'users.name', 'users.user_image')
                    ->orderBy('conversations.created_at', 'DESC')
                    ->get();
                //  dd($conversations);
            } else if (auth()->user()->role == 2) {
                $data = Conversation::join('users', 'users.nip', '=', 'conversations.nip')
                    ->join('m_pegawai', 'm_pegawai.nipbaru', '=', 'conversations.nip')
                    ->join('m_unitkerja', 'm_unitkerja.id', '=' ,'m_pegawai.fkunitkerja')
                    ->select('conversations.id as conv_id', 'conversations.tiket_status', 'conversations.user_id', 'users.id', 'users.name', 'users.user_image', 'users.nip', 'm_unitkerja.nama')
                    ->where('conversations.user_id', auth()->user()->id)
                    ->orderBy('conversations.created_at', 'DESC')
                    ->get();
            } else {
                $data = Conversation::join('users', 'users.id', '=', 'conversations.user_id')
                    ->join('topics', 'topics.id', '=', 'conversations.topic_id')
                    ->select('conversations.id as conv_id', 'conversations.tiket_status', 'conversations.user_id', 'conversations.topic_id', 'topics.topic_name', 'conversations.nip', 'users.id', 'users.name', 'users.user_image',)
                    ->where('conversations.nip', auth()->user()->nip)
                    ->orderBy('conversations.created_at', 'DESC')
                    ->get();
            }

            $conversations = array();
            foreach ($data as $u) {
                $last_chat = Message::where('conv_id', $u->conv_id)
                    ->orderBy('messages.id', 'DESC')
                    ->first();
                    $ajg = '';
                    if(auth()->user()->role == 3){
                        $ajg = $u->topic_name;
                    } else {
                        $ajg = $u->nama;
                    }

                $conversations[] = [
                    'conv_id' => $u->conv_id,
                    'tiket_status' => $u->tiket_status,
                    'user_id' => $u->user_id,
                    'topic_id' => $u->topic_id,
                    'topic_name' => $ajg,
                    'nip' => $u->nip,
                    'admin_id' => $u->id,
                    'name' => $u->name,
                    'user_image' => $u->user_image,
                    'last_chat' => substr($last_chat->body, 0, 30),
                    'last_chat_time' => $last_chat->created_at->diffForHumans(),
                    'last_chat_from' => $last_chat->user_id,
                ];
            }

            return response()->json([
                'status' => 'success',
                'data' => $conversations,
            ]);
        }
    }

    public function ajax_create_conv(Request $request)
    {
        if ($request->ajax()) {
            $conv = Conversation::where('nip', auth()->user()->nip)->where('tiket_status', 1)->first();

            //cek status tiket
            if ($conv) {
                $status = 'error';
                $message = 'Harap mengakhiri konsultasi sebelumnya untuk memulai konsutasi baru!';

                return response()->json([
                    'status' => $status,
                    'message' => $message,
                ]);
            } else {
                // buat room
                $user_topik = DB::select(
                    "
                SELECT user_id as uid,
                    (
                        SELECT COUNT(user_id)
                        FROM conversations
                        WHERE conversations.user_id = uid 
                    ) AS tot 
                    FROM user_topics WHERE  topic_id = '" . $request->topic_id . "' AND status = 0 ORDER BY tot ASC LIMIT 1"
                );

                $status = 'success';
                $message = '';

                $save = Conversation::create([
                    'topic_id' => $request->topic_id,
                    'user_id' => $user_topik[0]->uid,
                    'nip' => auth()->user()->nip,
                    'tiket_status' => '1',
                ]);

                $admin = User::findOrFail($user_topik[0]->uid);
                Message::create([
                    'conv_id' => $save->id,
                    'user_id' => $user_topik[0]->uid,
                    'attachment' =>  '0',
                    'body' => 'Hai, <strong>' . auth()->user()->name. '</strong>, perkenalkan nama saya ' . $admin->name . '. Sekarang anda sudah bisa memulai konsultasi..',
                ]);

                if ($save) {
                    $admin = User::findOrFail($user_topik[0]->uid);
                    return response()->json([
                        'status' => 'success',
                        'data' => $save,
                        'nama_admin' => $admin->name,
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Gagal menyimpan'
                    ]);
                }
            }
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $updateTiketStatus = Conversation::updateOrCreate(['id' => $request->id], ['tiket_status' => 2]);

        if ($updateTiketStatus) {
            return response()->json([
                'status' => 'success',
                'message' => 'Status tiket berhasil diubah.',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Status tiket gagal diubah.',
            ]);
        }
    }
    public function daftarKonsul()
    {
        if (auth()->user()->role == 1) {
            $daftarKonsul = Conversation::join('topics', 'topics.id', '=', 'conversations.topic_id')
                ->join('users', 'users.id', '=', 'conversations.user_id')
                ->join('m_pegawai', 'm_pegawai.nipbaru', '=' , 'conversations.nip')
                ->select(['conversations.*', 'users.name', 'topics.topic_name', 'm_pegawai.nama'])
                ->get();
        } else {
            $daftarKonsul = Conversation::join('topics', 'topics.id', '=', 'conversations.topic_id')
                ->join('users', 'users.id', '=', 'conversations.user_id')
                ->where('conversations.user_id', auth()->user()->id)
                ->select(['conversations.*', 'users.name', 'topics.topic_name'])
                ->get();
        }
        // dd($daftarKonsul);
        return view('admin.daftarKonsultasi', compact('daftarKonsul'));
    }

    public function edit($id)
    {
        $rangkuman = Conversation::find($id);
        return view('admin.rangkuman', compact('rangkuman'));
    }

    public function updateRangkuman(Request $request, $id)
    {
        $rangkuman = Conversation::find($id);
        $rangkuman->rangkuman = $request->input('rangkuman');
        $rangkuman->materi = $request->input('materi');
        $rangkuman->saran = $request->input('saran');
        $rangkuman->update();
        return redirect('/daftarKonsul');
    }
}
