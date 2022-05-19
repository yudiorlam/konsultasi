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
}
