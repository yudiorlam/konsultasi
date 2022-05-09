<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class DaftarTiket extends Controller
{
    public function ajax_get_topic (Request $request){
        if ($request->ajax()) {
            $tiket = Topic::all();

            return response()->json($tiket);
        }
    }
}
