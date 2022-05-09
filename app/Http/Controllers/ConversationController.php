<?php

namespace App\Http\Controllers;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function ajax_create_conv(Request $request)
    {
        if ($request->ajax()) {
            $conv = Conversation::where('nip' , auth()->user()->nip)->where('tiket_status' , 1)->first();
            
            //cek status tiket
            if ($conv){
                $status = 'error';
                $message = 'Harap mengakhiri konsultasi sebelumnya untuk memulai konsutasi baru!';
            } else{
                // buat room
                $user_topik = DB::select("
                SELECT user_id as uid, 
                    (
                        SELECT COUNT(user_id)
                        FROM conversations
                        WHERE conversations.user_id = uid 
                    ) AS tot 
                    FROM user_topics WHERE  topic_id = '" . $request->topic_id . "' ORDER BY tot ASC LIMIT 1"
                );

                $status = 'success';
                $message = '';

                $save = Conversation::create([
                    'topic_id' => $request->topic_id,
                    'user_id' => $user_topik[0]->uid,
                    'nip' => auth()->user()->nip,
                    'tiket_status' => '1',
                ]);

                if ($save) {
                    return response()->json([
                        'status' => 'success',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                    ]);
                    }
        }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $save,
            ]);
        }
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required',
        ]);

        $updateTiketStatus = Conversation::updateOrCreate(['id' => $request->id], ['tiket_status' => 2]);

        if($updateTiketStatus){
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
    public function daftarKonsul(){
        $daftarKonsul = Conversation :: join('topics', 'topics.id', '=' , 'conversations.topic_id' )
        -> join('users', 'users.id', '=' , 'conversations.user_id')
        ->get();
        //dd($daftarKonsul);
        return view ('admin.daftarKonsultasi' , compact('daftarKonsul'));
    }
    public function edit()
    {
        // $rangkuman = Conversation::find($id);
        return view('admin.rangkuman');
    }

    // public function update(Request $request, $id)
    // {
    //     $student = Student::find($id);
    //     $student->name = $request->input('name');
    //     $student->email = $request->input('email');
    //     $student->course = $request->input('course');
    //     $student->section = $request->input('section');
    //     $student->update();
    //     return redirect()->back()->with('status','Student Updated Successfully');
    // }
}
