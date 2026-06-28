<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Http\Requests\CreateCourseValidation;
use Illuminate\Support\Facades\File;

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
/*
        $activeValue = $request->input('active', '0'); // Default to '0' if not provided
        $course->active = ($activeValue === '1') ? 1 : 0; // Set to 1 if '1', otherwise set to 0
  */
        $course->active = $request->active ?? 0; // Set to 0 if not provided     
        
        
        $image = $request->file('photo');
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/courses'), $imageName);
            $course->photo = $imageName;
        }
        
        
        
        $course->save();

        return redirect()->route('courses.index')->with('success', $course->name.' Course created successfully.');
    }

    public function edit($id)
    {
        $course = Courses::findOrFail($id);
      
        return view('courses.edit', ['course' => $course]);
        
    }

    function update(CreateCourseValidation $request, $id)
    {
        $course = Courses::findOrFail($id);
        $course->name = $request->name;

        $activeValue = $request->input('active', '0'); // Default to '0' if not provided
        $course->active = ($activeValue === '1') ? 1 : 0; // Set to 1 if '1', otherwise set to 0

        $course->active = $request->active;// ?? 0; // Set to 0 if not provided

        $course->save();
        

        return redirect()->route('courses.index')->with('success', $course->name.' Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();
        $photoPath = public_path('images/courses/' . $course->photo);
        if (file_exists($photoPath)) {
            //unlink($photoPath);
            File::delete($photoPath);
        }   

        return redirect()->route('courses.index')->with('success', $course->name.' Course deleted successfully.');
    }
}
