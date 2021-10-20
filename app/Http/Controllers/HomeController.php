<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::active()->get();
        $courses = Course::active()->get();
        $ratings = collect($courses)->groupBy('rating');
//        foreach ($ratings as $k => $rating){
//            return $k;
//        }
        return view('index', compact('categories', 'ratings', 'courses'));
    }

    public function filter(Request $request){
        $courses = Course::active();
        if (isset($request->categories)){
            $courses = $courses->whereIn('category_id', $request->categories);
        }
        if (isset($request->levels)){
            $courses = $courses->whereIn('levels', $request->levels);
        }
        if (isset($request->ratings)){
            $courses = $courses->where('rating', $request->ratings);
        }
        if (isset($request->times)){
            $time = $request->times;
            if ($time == 'less_4')
                $courses = $courses->where('hours', '<',4);
            if ($time == 'less_8')
                $courses = $courses->where('hours', '<',8);
            if ($time == 'more_8')
                $courses = $courses->where('hours', '>=',8);
        }
        if (isset($request->search)){
            $courses = $courses->where(function($query) use ($request){
                $query->where('name', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->search.'%');
            });
        }
        return $courses->get();
    }
}
