<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
  
class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('notification');
    }
  
    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {

        User::where('id', auth()->user()->id)
            ->update(['device_token' => $request->token]);

        return redirect('notification');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        $url ="https://fcm.googleapis.com/fcm/send";

        $fields=array(
            "to"=>  auth()->user()->device_token,
            "notification"=>array(
                "body"=>$request->body,
                "title"=>$request->title,
                "icon"=> '',
                "click_action"=>"https://shinerweb.com"
            )
        );

        $headers=array(
            'Authorization: key=AAAATdcGZO4:APA91bFaApgCAE2fKIgNMmsKgewdVAJbBYyK4xD9NAmeogWfmSK1fYqicLHnaif0ZNYTDUUWdPx9qCLMwkVJHW11syI38ZepmIm_xeK96xEegcdYWCN0ecRyyKbQI7_wFsjOR8Y6my7F',
            'Content-Type:application/json'
        );

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
        $result=curl_exec($ch);
        curl_close($ch);

        return response()->json($result);
    }
}