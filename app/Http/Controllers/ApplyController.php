<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apply;
use App\Topic;
use Auth;


class ApplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.apply.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $topics = Topic::whereNull('assignedTo')->get();
        $applications = Apply::where('user_id', $id)->latest()->get();
        $utopics = Topic::where('assignedTo', $id)->get();
        return view('dashboard.apply.create')->withTopics($topics)->withApplications($applications)->withUtopics($utopics);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'topic_id' => 'required'
        ));
        $apply = new Apply;
        $apply->topic_id = $request->topic_id;
        $id = Auth::id();
        $apply->user_id = $id;
        $uname = Auth::user()->name;
        $apply->uname = $uname;

        $apply->save();


        return back()->with('success', 'You successfully applied for this topic.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apply = Apply::find($id);
        $apply->delete();
        return redirect('applyThesis/create')->with('success','You have successfully deleted this application.');
    }
}
