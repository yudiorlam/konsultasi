<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\FCM;
use Session;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->token);
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('user/login');
        }
    }

    // public function save_fcm(Request $request)
    // {
    //     $data = $this->validate($request, [
    //         'user_id' => 'required',
    //         'token' => 'required',
    //     ]);

    //     $save = FCM::create($data);

    //     if ($save) {
    //         return response()->json([
    //             'status' => 'success',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'error',
    //         ]);
    //     }
    // }

    public function actionlogin(Request $request)
    {
        // $credentials = request()->validate([
        //     'login' => 'required',
        //     'password' => 'required'
        // ]);

        $credentials = Validator::make(
            $request->all(),
            [
                'login' => 'required',
                'password' => 'required|min:4'
            ],
            [
                'login.required' => 'NIP atau email harus diisi!',
                'password.required' => 'Password harus diisi!',
                'password.min' => 'Password minimal 8 karakter!',
            ]
        );

        if ($credentials->fails()) {
            return back()
                ->withErrors($credentials)
                ->withInput();
        }

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
        ?'email'
        :'nip';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::Attempt($request->only($login_type,'password'))) {
            if(auth()->user()->role == 1){
                return redirect('dashboard');
            } else {
                return redirect('chat');
            }
        }else{
            return back()->withInput();
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getChangePassword(){
        return view('user.changePassword');
    }
}