<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Topic;
use App\Deadline;
use App\Feedback;
use Auth;
use Carbon\Carbon;
use Mail;
use App\Role;
use App\Mail\UserRequestAccess;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $today = Carbon::now();
        $id = Auth::id();
        $ptasks = Task::where('assignedBy', $id)
                    ->orderBy('date', 'asc')        
                    ->latest()->get();
        $deadlines = Deadline::all();
        $tasks = Task::where('assignedTo', $id)
                    ->orderBy('date', 'asc')
                    ->latest()->get();
        $topics = Topic::where('assignedTo', $id)->latest()->get();
        $assignedtopics = Topic::where('assignedTo', '!=', 'null')
                                ->where('user_id', $id)->get();
        return view('home')->withTasks($tasks)->withTopics($topics)
                            ->withDeadlines($deadlines)->withPtasks($ptasks)
                            ->withToday($today)->withAssignedtopics($assignedtopics)->withUsers($users);
    }
    public function getFeedbacks()
    {
        $feedbacks = Feedback::latest()->get();
        return view('dashboard.feedbacks.index')->withFeedbacks($feedbacks);
    }

    public function email()
    {
        $admins = Role::where('name','administrator')->first()->users()->get();
    
        Mail::to($admins)->send(new UserRequestAccess());

        
        return redirect('/home');
    }
}
