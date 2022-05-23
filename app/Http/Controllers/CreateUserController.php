<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CreateUserController extends Controller
{
    public function index() {
        $daftarUser = User:: where('role', 2)->get();
        return view ('admin.createUser' , compact('daftarUser'));
    }

    public function create(Request $request)
    {
        
    $createUser = User::all();
    $user = User::where('role', 2)->get();
    //dd($topik);
        return view ('admin.createUser' , compact('user' , 'createUser'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);

        $save = User_topic::create($request->all());
        if($save){

        }else{
            
        }

        return redirect('/getAdminTopik');
    }
}
