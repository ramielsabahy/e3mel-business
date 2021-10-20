<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'category_id'           => 'required|exists:categories,id',
            'name'                  => 'required',
            'description'           => 'required',
            'rating'                => 'required',
            'views'                 => 'required',
            'levels'                => 'required',
            'hours'                 => 'required',
        ]);

        if ($v->fails()){
            session()->flash('error', $v->errors()->first());
        }

        Course::create($request->all());
        session()->flash('success', 'Created successfully');
        return redirect()->route('courses.index');
    }

    public function toggleStatus($id){
        $course = Course::find($id);
        $course->is_active = !$course->is_active;
        $course->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::get();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'category_id'           => 'required|exists:categories,id',
            'name'                  => 'required',
            'description'           => 'required',
            'rating'                => 'required',
            'views'                 => 'required',
            'levels'                => 'required',
            'hours'                 => 'required',
        ]);

        if ($v->fails()){
            session()->flash('error', $v->errors()->first());
        }

        Course::where('id', $id)->update($request->except('_token', '_method'));
        session()->flash('success', 'Created successfully');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        session()->flash('success', 'Deleted successfully');
        return redirect()->back();
    }
}
