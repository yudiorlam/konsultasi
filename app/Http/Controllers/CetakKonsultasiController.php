<?php

namespace App\Http\Controllers;
use App\Models\Conversation;

use Illuminate\Http\Request;

class CetakKonsultasiController extends Controller
{
    public function index(){
        $daftarCetak= Conversation::join('users', 'users.id', '=' ,'conversations.user_id')
        ->join('topics', 'topics.id' , '=' ,'conversations.topic_id')
        ->select(['conversations.*' , 'users.name', 'topics.topic_name'])
        ->get();
        dd($daftarCetak);
        return view ('admin.cetakKonsultasi', compact('daftarCetak'));
    }
}
