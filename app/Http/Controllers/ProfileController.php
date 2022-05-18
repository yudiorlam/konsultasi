<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        if($request->hasFile('user_image')){
            $fileName = time() . '.' . request()->user_image->getClientOriginalExtension();

            if(auth()->user()->user_image != 'users/default.jpg'){
                File::delete(public_path('storage/'). auth()->user()->user_image);
            }

            request()->user_image->move(public_path('storage/users/'), $fileName);

            $new_image_user = $fileName;

            User::where('id', auth()->user()->id)->update([
                'user_image' => 'users/'.$new_image_user,
            ]);
        }

        if($request->password == null){
            $this->validate($request,[
                'notelp' => 'required',
            ]);
            Pegawai::where('nipbaru', auth()->user()->nip)->update([
                'notelp' => $request->notelp,
            ]);

            return back()->with('success', 'Berhasil memperbarui data diri anda...');

        } else {
            $this->validate($request,[
                'notelp' => 'required',
                'password' => 'min:3',
                'confirm-password' => 'required_with:password|same:password|min:3'
            ]);

            Pegawai::where('nipbaru', auth()->user()->nip)->update([
                'notelp' => $request->notelp,
            ]);

            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Berhasil memperbarui data diri anda...');
        }

        return back()->withInput();
    }
}
