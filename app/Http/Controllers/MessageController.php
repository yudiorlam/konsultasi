<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\MessagePuki;
use App\Events\NewMessageNotification;
use App\Models\Conversation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Respose;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function chatUser()
    {
        return view('user.single-chat');
    }


    public function ajax_fetch_chats(Request $request)
    {
        $id = $request->id;
        // $last_chat_id = $request->last_chat_id;

        // dd($last_chat_id);
        if ($request->ajax()) {
            $conversation = Conversation::where('id', $id)->first();

            // if($last_chat_id == null){
            $chats = Message::where('conv_id', $id)
                ->join('users', 'users.id', '=', 'messages.user_id')
                ->orderBy('messages.id', 'ASC')
                ->select('messages.*', 'users.id', 'users.name', 'users.user_image', 'messages.id as messages_id')
                ->get();
            // } else {
            //     $chats = Message::where('conv_id', '>' , $last_chat_id)
            //         ->join('users', 'users.id' , '=' , 'messages.user_id')
            //         ->orderBy('messages.id', 'ASC')
            //         ->select('messages.*', 'users.id', 'users.name', 'users.user_image')
            //         ->get();
            // }

            $last_chat = Message::where('conv_id', $id)
                ->orderBy('messages.id', 'DESC')
                ->first();

            $data = array();
            foreach ($chats as $u) {

                $tes = strtotime($u->created_at);

                // dd(time());

                if((time() - 86400) < $tes ){
                    $time = $u->created_at->format('H:i A');
                } else {
                    $time = $u->created_at->format('d/m/Y H:i A');
                }

                $data[] = [
                    'conv_id' => $u->conv_id,
                    'message_id' => $u->messages_id,
                    'user_id' => $u->user_id,
                    'body' => $u->body,
                    'name' => $u->name,
                    'attachment' => $u->attachment,
                    'is_read' => $u->is_read,
                    'user_image' => $u->user_image,
                    'created_at' => $time,
                    // $u->created_at->diffForHumans()
                ];
            }

            $data = [
                'status' => 'success',
                'conv_id' => $id,
                'receiver_name' => '',
                'tiket_status' => $conversation->tiket_status,
                'last_chat' => substr($last_chat->body, 0, 20),
                'chats' => $data,
            ];

            return response()->json($data);
        }
    }

    public function send_message(Request $request)
    {
        $data = $this->validate($request, [
            'body' => 'required',
            'conv_id' => 'required',
            'user_id' => 'required',
        ]);


        $save = Message::create($data);

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

    public function download_attachment($id){
        
        $message = Message::findOrFail($id);
        $file= public_path('/'). "storage/" . $message->attachment;
        $headers = array(
                'Content-Type: application/pdf',
            );
        return \Response::download($file, substr($message->attachment, 11) . '.pdf', $headers);
        // return response()->download($file, 'filename.pdf', $headers);
    }

    public function send_attachment(Request $request)
    {
        if($request->att_type == 'image'){
            $validator = Validator::make($request->all(), [
                'attachment' => 'required|image|file|max:500',
            ]);
            // $data = $this->validate($request, [
            //     'attachment' => 'required|image|file|max:500',
            // ]);
        } else {
            // $data = $this->validate($request, [
            //     'attachment' => 'required|mimetypes:application/pdf|max:500',
            // ]);
            $validator = Validator::make($request->all(), [
                'attachment' => 'required|mimetypes:application/pdf|max:500',
            ]);
        }

        if ($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ukuran file maksimal 500 kb.'
            ]);
        }

        

        $fileName = time() . '-' . $request->file('attachment')->getClientOriginalName();
        $request->file('attachment')->storeAs('attachment', $fileName);

        if ($request->att_body != '') {
            $save = Message::create([
                'conv_id' => $request->conv_id,
                'user_id' => auth()->user()->id,
                'attachment' =>  'attachment/'. $fileName,
                'body' => $request->att_body,
            ]);
        } else {
            $save = Message::create([
                'conv_id' => $request->conv_id,
                'user_id' => auth()->user()->id,
                'attachment' =>  'attachment/'. $fileName,
                'body' => '',
            ]);
        }

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
}
