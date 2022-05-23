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

    public function create(Request $request)
    {
        
    $topik = Topic::all();
    $user = User::where('role', 2)->get();
    //dd($topik);
        return view ('admin.addAdmin' , compact('topik' , 'user'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nip' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'topic_id' => 'required'
        ]);

        $user = User::where('nip', $request->nip)->first();
        $user->role = 2;
        $user->update();

        $save = User_topic::create([
            'user_id' => $user->id,
            'topic_id' => $request->topic_id,
            'status' => 1
        ]);
      
        return redirect('/getAdminTopik')->with(['success', 'Berhasil menambahkan data admin']);
    }
    public function edit($id)
    {
    	$category = User_topic::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }


    // cek pegawai
    public function cek_pegawai(Request $request){
        $pegawai = User::where('nip', $request->nip)->first();

        // dd($pegawai);

        if($pegawai){
            return response()->json([
                'status' => 'success',
                'data' => $pegawai->name,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }


}
