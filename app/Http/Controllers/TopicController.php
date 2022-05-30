<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Yajra\DataTables\DataTables;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  if ($request->ajax()) {
        //     $data = Topic::all();

        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit"><i class="far fa-edit fs-2 text-info"></i></a>';

        //             $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete"><i class="far fa-trash-alt fs-2 text-danger"></i></a>';

        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        
        // return view('admin.topik');


        $topik = Topic::all();
        return view('admin.topik', compact('topik')); 
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_name' => 'required',
        ]);

        $save = Topic::updateOrCreate(
            [
                'id' => $request->id,
                'status' => 0
            ],
            [
                'topic_name' => ucwords($request->topic_name),
            ]
        );

        if ($save) {
            return redirect('/topic');
                
        } else {
           //
        }
    }

    public function show(Topic $topic)
    {
        //
    }

    public function edit($id)
    {
    	$topik = Topic::find($id);

	    return response()->json([
	      'data' => $topik
	    ]);
    }

    public function update (Request $request, $id)
    {
        // dd($id);
        Topic::updateOrCreate([
            'id' => $id
        ],
        [
            'topic_name' => $request->topic_name,
        ]
        );

        return response()->json([ 'success' => true ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    public function updateTopic(Request $request)
    {
        $status = Topic::find($request->input('id'));
        $status->status = $request->input('status');
        $status->update();
        return redirect('/topic');
    }
}
