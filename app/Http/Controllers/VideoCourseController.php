<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoCourse;
use App\Subject;

class VideoCourseController extends Controller
{
    /**
     * Display a listing of the video courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();

        $filterSubject = $request->get('filterSubject');
        $title = $request->get('searchTitle');

        $selectedSubjectId = $filterSubject > 0 ? $filterSubject : 0;

        $videoCourseQuery = VideoCourse::sortable()
            ->where('title', 'LIKE', '%'.$title.'%');

        // If we have a filter by subject
        if($filterSubject > 0) {
            $videoCourseQuery->where('subject_id', $filterSubject);
        }   
        $videoCourses = $videoCourseQuery->paginate(5);
		
        return view('video_course.index', [
            'videoCourses' => $videoCourses,
            'searchTitle' => $title,
            'subjects' => $subjects,
            'selectedSubjectId' => $selectedSubjectId
        ]);
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
