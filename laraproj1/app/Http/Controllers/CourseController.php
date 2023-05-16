<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($coursename)
    {
    //
    $coursesmodel = new Course();
    $courses=$coursesmodel
          ->where('coursename','like','%'.$coursename.'%')
          ->take(20)
          ->get();
    return $courses->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create(string $coursename, string $teacher, string $course_description
                    , string $lecture_number, string $coursebooks)
    {
    //
      $newcourse= new Course();
      $newcourse->coursename=$coursename;
      $newcourse->teacher=$teacher;
      $newcourse->course_description=$course_description;
      $newcourse->lecture_number=$lecture_number;
    $newcourse->coursebooks=$coursebooks;
    $newcourse->save();
    return 'success';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
  }
    /**
     * Display a listing of the resource.
     */
    public function autocomp($coursename)
    {
    //
    $coursesmodel = new Course();
    $courses=$coursesmodel
          ->select("coursename")
          ->where('coursename','like','%'.$coursename.'%')
          ->take(20)
          ->get();
    return $courses->toJson();
    }


}
