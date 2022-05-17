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

class MessageController extends Controller
{
    public function index()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';



        $message = Message::join('users', 'users');

        return view('user.single-chat', compact('page_title', 'page_description'));
    }

    public function chatUser()
    {
        $user_id = Auth::user()->id;
        if (auth()->user()->role == 1) {
            $conversations = Conversation::join('users', 'users.id', '=', 'conversations.user_id')
                ->select('conversations.id as conv_id', 'conversations.tiket_status', 'users.id', 'users.name', 'users.user_image')
                ->get();
            //  dd($conversations);
        } else if (auth()->user()->role == 2) {
            $conversations = Conversation::join('users', 'users.nip', '=', 'conversations.nip')
                ->select('conversations.id as conv_id', 'conversations.tiket_status', 'conversations.user_id', 'users.id', 'users.name', 'users.user_image', 'users.nip')
                ->where('conversations.user_id', auth()->user()->id)
                ->get();
            //  dd($conversations);
        } else {
            $conversations = Conversation::join('users', 'users.id', '=', 'conversations.user_id')
                ->join('topics', 'topics.id', '=', 'conversations.topic_id')
                ->select('conversations.id as conv_id', 'conversations.tiket_status', 'conversations.user_id', 'conversations.topic_id', 'topics.topic_name', 'conversations.nip', 'users.id', 'users.name', 'users.user_image',)
                ->where('conversations.nip', auth()->user()->nip)
                ->get();
            //  dd($conversations);
        }

        return view('user.single-chat', compact('conversations', 'user_id'));
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

            // $last_chat = Message::orderBy('messages.id', 'DESC')->first();

            $data = array();
            foreach ($chats as $u) {
                $data[] = [
                    'conv_id' => $u->conv_id,
                    'message_id' =>$u->messages_id,
                    'user_id' => $u->user_id,
                    'body' => $u->body,
                    'name' => $u->name,
                    'attachment' => $u->attachment,
                    'is_read' => $u->is_read,
                    'user_image' => $u->user_image,
                    'created_at' => $u->created_at->diffForHumans(),
                ];
            }

            $data = [
                'status' => 'success',
                'conv_id' => $id,
                'tiket_status' => $conversation->tiket_status,
                // 'last_chat_id' => $last_chat->id,
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


    public function send_attachment(Request $request)
    {
        $data = $this->validate($request, [
            'attachment' => 'image|file|max:2040',
        ]);

        if ($request->att_body != '') {
            $save = Message::create([
                'conv_id' => $request->conv_id,
                'user_id' => auth()->user()->id,
                'attachment' =>  $request->file('attachment')->store('attachment'),
                'body' => $request->att_body,
            ]);
        } else {
            $save = Message::create([
                'conv_id' => $request->conv_id,
                'user_id' => auth()->user()->id,
                'attachment' =>  $request->file('attachment')->store('attachment'),
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
