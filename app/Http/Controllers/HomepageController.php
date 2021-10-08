<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Feedback;
use App\Deadline;
use App\Category;
use Carbon\Carbon;
use App\Apply;
use Auth;
class HomepageController extends Controller
{
    public function index()
    {
        $deadlines = Deadline::orderBy('date', 'asc')        
        ->latest()->get();
        $topics = Topic::with('hasAuthor')->orderBy('id', 'desc')->paginate(3);
        return view('welcome')->withTopics($topics)->withDeadlines($deadlines);
    }

    public function sendFeedback()
    {
        $feedback = $this->validate(request(), [
            'name' => 'required|max:255|string',
            'body' => 'required'
          ]);
          
          Feedback::create($feedback);
  
          return back();
    }
    public function all()
    {
        $categories = Category::with('topics')->get();
        $topics = Topic::orderBy('id', 'desc')->paginate(3);
        return view('dashboard.manage.topics.all')->withTopics($topics)->withCategories($categories);
    }
    public function single($id)
    {
        $uid = Auth::id();
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        $applied = Apply::where('user_id', $uid)
                        ->where('topic_id', $topic->id)->get();
        $hasTopic = Topic::where('assignedTo', $uid)->get();
        return view('dashboard.manage.topics.single')->withTopic($topic)->withCategories($categories)->withApplied($applied)->withHasTopic($hasTopic);
    }

    public function category($id)
    {
        $categories = Category::with(['topics' => function($query) {
            $query->where('created_at', "<=", Carbon::now());
        }])->get();
        $topics = Topic::orderBy('id', 'desc')
                        ->where('category_id', $id)
                        ->paginate(3);
        return view('dashboard.manage.topics.all')->withTopics($topics)->withCategories($categories);
    }

}
