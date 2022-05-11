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
        ->get();
        $user = User::where('role', 2)->get();
        // dd($topik);
        return view ('admin.adminTopik' , compact('topik' , 'user'));

        
        
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_topic  $user_topic
     * @return \Illuminate\Http\Response
     */
    public function show(User_topic $user_topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_topic  $user_topic
     * @return \Illuminate\Http\Response
     */
    public function edit(User_topic $user_topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_topicRequest  $request
     * @param  \App\Models\User_topic  $user_topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_topicRequest $request, User_topic $user_topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_topic  $user_topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_topic $user_topic)
    {
        //
    }
}
