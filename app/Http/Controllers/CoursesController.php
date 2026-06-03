<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    //
    public function index()
    {
        return view('courses.index');
    }
}
