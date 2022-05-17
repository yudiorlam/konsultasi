<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        $user =  User::join('m_pegawai', 'm_pegawai.nipbaru', '=', 'users.nip')
            ->join('m_unitkerja', 'm_unitkerja.id', '=', 'm_pegawai.fkunitkerja')
            ->select(['users.*', 'm_pegawai.nipbaru', 'm_pegawai.notelp', 'm_pegawai.fkunitkerja','m_pegawai.fkgolongan', 'm_unitkerja.nama'])
            ->where('users.nip', auth()->user()->nip)
            ->first();
        return view('user.changePassword', compact('user'));
    }
}
