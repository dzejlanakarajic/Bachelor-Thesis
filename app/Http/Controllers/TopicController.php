<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\User;
use App\Role;
use App\Category;
use Notification;
use App\Notifications\NewTopic;
use Auth;
use App\Apply;

class TopicController extends Controller
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
        $id = Auth::id();
        $topics = Topic::where('user_id', $id)->latest()->get();
        return view('dashboard.manage.topics.index')->withTopics($topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Role::where('name','student')->first()->users()->get();
        $categories = Category::all();
        return view('dashboard.manage.topics.create')->withCategories($categories)->withUsers($users);
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
            'category_id' => 'required|integer',
            'description' => 'required',
            'assignedTo' => 'nullable|unique:topics'
        ));
        $topic = new Topic;
        $topic->name = $request->name;
        $topic->category_id = $request->category_id;
        $topic->description = $request->description;
        $topic->assignedTo = $request->assignedTo;

        $id = Auth::id();
        $topic->user_id = $id;

        $topic->save();

        $aplikacije = Apply::where('user_id', $topic->assignedTo)->delete();
        $topicapp = Apply::where('topic_id', $topic->id)->delete();
        $users = Role::where('name','student')->first()->users()->get();

        Notification::send($users, new NewTopic($topic));

        return back()->with('success', 'You have successfully published a topic!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $applicants = Apply::where('topic_id', $id)->latest()->get();
        return view('dashboard.manage.topics.show')->withTopic($topic)->withApplicants($applicants);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $applicants = Apply::where('topic_id', $id)->latest()->get();
        $topic = Topic::find($id);
        $categories = Category::all();
        return view('dashboard.manage.topics.edit', compact('topic', 'id'))->withCategories($categories)->withApplicants($applicants);
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
        $topic = Topic::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'category_id' => 'required',
          'description' => 'required'
        ]);
        $topic->name = $request->get('name');
        $topic->category_id = $request->get('category_id');
        $topic->description = $request->get('description');
        $topic->assignedTo = $request->get('assignedTo');
        $topic->save();
        
        $aplikacije = Apply::where('user_id', $topic->assignedTo)->delete();
        $topicapp = Apply::where('topic_id', $topic->id)->delete();
        return redirect('manage/topics')->with('success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect('manage/topics')->with('success','Product has been  deleted');
    }
}
