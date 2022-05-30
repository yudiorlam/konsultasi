<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiSyncController extends Controller
{
    public function sync()
    {
        $pegawai = Pegawai::all();

        foreach ($pegawai as $u) {
            $data[] = [
                'nip' => $u->nipbaru,
                'name' => $u->nama,
                'role' => 3,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'user_image' => 'users/default.jpg',
            ];
        }

        // dd($data);

        User::insert($data);
    }

    public function per_instansi()
    {
        $pegawai = Pegawai::select('fkunitkerja')->distinct()->get();
    }

    public function delete_all_pegawai()
    {
        User::truncate();
    }

}
