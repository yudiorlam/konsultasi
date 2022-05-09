<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    //     $cek = DB::table('m_pegawai')->where('nipbaru', '=', 'nisn')->first();
    //     if ($cek !== null) {
        
    // }
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'nip' => ['required', 'numeric', 'min:11', 'unique:users',],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    }
    public function index()
    {
        return view('register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //  table('m_pegawai')->where('nipbaru', '=', Input::get('nisn'))->first();
        //  $cek = DB::table('m_pegawai')->where('nipbaru', '=', 'nisn'))->first();
        // if ($cek === null) {
            $user = DB::table('m_pegawai')->where('nipbaru', $data['nip'])->first();

            
            
            if(isset($user->nipbaru)){
            User::create([
                    'name' => $data['name'],
                    'nisn' => $data['nip'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
                return redirect('/register')->with('success', 'Anda Sudah Terdaftar Silahkan Login!');
            
            }else{
                //var_dump("tidak ada datanya");die();
                return redirect('/register')->with('warning', 'Maaf, Anda Bukan Pegawai Pemkab Luwu Timur ');
            }
            
    // }else{
    //     var_dump($cek);
    // }
    }
}
