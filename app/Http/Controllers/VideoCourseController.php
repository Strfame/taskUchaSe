<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoCourseController extends Controller
{
    public function index() {

        return view('video_course.index');
    }
}
