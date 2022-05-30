<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class DaftarTiket extends Controller
{
    public function ajax_get_topic (Request $request){
        if ($request->ajax()) {
            $tiket = Topic::where('status', 0)->get();

            return response()->json($tiket);
        }
    }
}
