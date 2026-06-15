<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Http\Requests\CreateCourseValidation;

class CoursesController extends Controller
{
    //
    public function index()
    {
        $courses = Courses::all();
        return view('courses.index',['courses' => $courses]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CreateCourseValidation $request)
    {
        /*
       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    */
        /*
        $counter = Courses::where('name', $request->name)->count();
        if ($counter > 0) {
            return redirect()->back()->with('error', 'Course with this name already exists.')->withInput();
        }
*/
        $course = new Courses();
        $course->name = $request->name;

        $activeValue = $request->input('active', '0'); // Default to '0' if not provided
        $course->active = ($activeValue === '1') ? 1 : 0; // Set to 1 if '1', otherwise set to 0
       
        $course->save();

        return redirect()->route('courses.index')->with('success', $course->name.' Course created successfully.');
    }
}
