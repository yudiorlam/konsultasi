<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\MessagePuki;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;
 
class MessageControllerPuki extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);
 
        return view('broadcast', $data);
    }
    public function index2()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);
 
        return view('welcome', $data);
    }
 
    public function send()
    {
        // ...
         
        // message is being sent
        $message = new MessagePuki;
        $message->setAttribute('from', 5);
        $message->setAttribute('to', 5);
        $message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();
         
        // want to broadcast NewMessageNotification event
        event(new NewMessageNotification($message));
         
        // ...
    }
}