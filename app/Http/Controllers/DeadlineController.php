<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deadline;
use Session;

class DeadlineController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deadlines = Deadline::orderBy('date', 'asc')        
        ->latest()->get();
        return view('dashboard.manage.deadlines.index')->withDeadlines($deadlines);
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
            'name' => 'required',
            'date' => 'required'
        ));
        $deadline = new Deadline;
        $deadline->name = $request->name;
        $deadline->date = $request->date;

      

        $deadline->save();


        return back()->with('success', 'Task has been added');
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
        $deadline = Deadline::findOrFail($id);
        return view('dashboard.manage.deadlines.edit')->withDeadline($deadline);
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
        $this->validateWith([
            'name' => 'required|max:255',
            'date' => 'required|date'
          ]);
          $deadline = Deadline::findOrFail($id);
          $deadline->name = $request->name;
          $deadline->date = $request->date;
          $deadline->save();
          Session::flash('success', 'Updated the '. $deadline->name . ' deadline.');
          return redirect()->route('deadlines.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deadline = Deadline::find($id);
        $deadline->delete();
        return redirect()->route('deadlines.create')->with('success','Deadline has been  deleted');
    }
}
