<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\CourseResource;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses(){
        $courses = Course::active()->get();
        $categories = Category::active()->get();

        return customResponse([
            'courses'   => CourseResource::collection($courses),
            'categories'    => CategoryResource::collection($categories)
        ], 200);
    }
}
