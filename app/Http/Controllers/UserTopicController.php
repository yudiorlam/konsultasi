<?php

namespace App\Http\Controllers;

use App\Models\User_topic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class UserTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topik = User_topic::join('topics' ,'topics.id', '=' , 'user_topics.topic_id')
        ->join('users', 'users.id', '=' , 'user_topics.user_id')
        ->select('user_topics.*', 'users.name', 'topics.topic_name')
        ->get();
        $user = User::where('role', 2)->get();
        $tiket = Topic::all();
        // dd($user);
        return view ('admin.adminTopik' , compact('topik' , 'user', 'tiket'));

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    $topik = Topic::all();
    $user = User::where('role', 2)->get();
    //dd($topik);
        return view ('admin.addAdmin' , compact('topik' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_topicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'topic_id' => 'required'
        ]);

        $save = User_topic::create($request->all());
        if($save){

        }else{
            
        }

        return redirect('/getAdminTopik');
    }
    public function edit($id)
    {
    	$category = User_topic::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }
}
