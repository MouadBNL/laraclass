<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(20);
        return view('course.index', compact(['courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels     = Level::all();
        $subjects   = Subject::all();
        return view('course.create', compact('levels', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'level' => ['required', 'exists:levels,id'],
            'subject' => ['required', 'exists:subjects,id'],
            'course_file' => ['required']
        ]);


        $file_name = Carbon::now()->format('Y-m-d') . "_" . request()->file('course_file')->getClientOriginalName();
        $file = request()->file('course_file')->storeAs('courses', $file_name);
        dd($file);

        auth()->user()->courses()->create([
            'title' => request('title'),
            'level_id' => request('level'),
            'subject_id' => request('subject'),
            'link' => "/storage/" . $file_name
        ]);

        return redirect()->route('course.index')->with('status', 'Cours ajouter.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
