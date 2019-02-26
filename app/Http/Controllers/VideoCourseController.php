<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoCourse;

class VideoCourseController extends Controller
{
    /**
     * Display a listing of the video courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->get('searchTitle');

        $videoCourses = VideoCourse::sortable()
            ->where('title', 'LIKE', '%'.$title.'%')																
            ->paginate(5);
		
        return view('video_course.index', ['videoCourses' => $videoCourses, 'searchTitle' => $title]);
    }
    
    /**
     * Store a newly created video course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {					
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|max:500'
        ]);
						
        VideoCourse::create($request->toArray());
				
        return redirect()
            ->back()
            ->with('success', 'The video course was saved.');
    }
    
    
	public function show() {
		
		return view('video_course.show');
    }
    


}
