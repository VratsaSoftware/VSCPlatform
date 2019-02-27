<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Events\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function allCourses()
    {
        $courses = Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')->get();
        $pastCourses = Course::where('ends', '<', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')->get();
        return view('admin.courses', ['courses' => $courses,'pastCourses' => $pastCourses]);
    }

    public function showAllEvents()
    {
        $events = Event::with('Teams', 'Teams.Members', 'Teams.Members.User', 'Teams.Members.User.Occupation', 'Teams.Members.Role', 'Teams.Category')->where('to', '>', Carbon::now()->format('Y-m-d H:m:s'))->get();
        $pastEvents = Event::with('Teams', 'Teams.Members', 'Teams.Category')->where('to', '<', Carbon::now()->format('Y-m-d H:m:s'))->get();
        return view('admin.events', ['events' => $events,'pastEvents' => $pastEvents]);
    }
}
