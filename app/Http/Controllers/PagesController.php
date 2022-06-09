<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        $donat = DB::table('conversations')
                ->join('topics', 'topics.id', '=', 'conversations.topic_id')
                ->select('conversations.topic_id', DB::raw('count(*) as total'), 'topics.topic_name')
                ->groupBy('conversations.topic_id')
                ->whereMonth('conversations.created_at', Carbon::now())
                ->get();

                $keuangan = Conversation::where('topic_id', 37)
                ->whereMonth('created_at' ,Carbon::now())
                ->count();
                $kegiatanFisik = Conversation::where('topic_id', 38)
                ->whereMonth('created_at' ,Carbon::now())
                ->count();
                $kepegawaian = Conversation::where('topic_id', 39)
                ->whereMonth('created_at' ,Carbon::now())
                ->count();
                $dll = Conversation::where('topic_id', 39)
                ->whereMonth('created_at' ,Carbon::now())
                ->count();
                $total = Conversation::whereMonth('created_at' ,Carbon::now())->count();
                $status1 = Conversation::where('tiket_status', 1)
                ->whereDay('created_at', Carbon::now())
                ->count();
                $status2 = Conversation::where('tiket_status', 2)
                ->whereDay('created_at', Carbon::now())
                ->count();
                
        
        return view('admin.dashboard2', compact('donat', 'page_title', 'page_description', 'keuangan', 'kegiatanFisik', 'kepegawaian', 'dll', 'total', 'status1', 'status2'));
    }


    public function donat(){
        $donat = DB::table('conversations')
                ->join('topics', 'topics.id', '=', 'conversations.topic_id')
                ->select(DB::raw('count(*) as value'), 'topics.topic_name as category')
                ->groupBy('conversations.topic_id')
                ->whereMonth('conversations.created_at', Carbon::now())
                ->get();
                
        return response()->json($donat);
    }

    public function batangan(){
        $batangan = DB::table('conversations')
                ->join('users', 'users.id', '=', 'conversations.user_id')
                ->select(DB::raw('count(*) as steps'), 'users.name as name', 'users.name as name', 'users.user_image as pictureSettings')
                ->groupBy('conversations.user_id')
                ->whereMonth('conversations.created_at', Carbon::now())
                ->get();

        foreach ($batangan as $b) {
            $batangans[] = [
                'name' => $b->name,
                'steps' => $b->steps,
                'pictureSettings' => [
                    'src' => asset('storage'). "/" .$b->pictureSettings, 
                ],
            ];
        }
                
        return response()->json($batangans);
    }


    public function line(){
        $line = DB::table('conversations')
                ->select(DB::raw('count(*) as value'), 'conversations.created_at')
                ->groupBy('conversations.created_at')
                ->whereMonth('conversations.created_at', Carbon::now())
                ->get();

        foreach ($line as $b) {
            $lines[] = [
                'date' => Carbon::parse($b->created_at)->format('d/m/Y'),
                'value' => $b->value,
            ];
        }
                
        return response()->json($lines);
    }


    /**
     * Demo methods below
     */

    // Datatables
    public function landingPage()
    {
        $page_title = 'Add Admin';
        $page_description = 'This is datatables test page';

        return view('landing.landing', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function addTopik()
    {
        $page_title = 'Add topik';
        $page_description = 'This is KTdatatables test page';

        return view('pages.addTopik', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // jQuery-mask
    public function jQueryMask()
    {
        $page_title = 'jquery-mask';
        $page_description = 'This is jquery masks test page';

        return view('pages.jquery-mask', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }


}
