<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view("index",[
            "all_courses"=>$courses
        ]);
        
    }

    public function create_course(Request $request)
    {

        $request->validate([
            "title" => "required|max:50",
            "description" => "required",
            "cost" => "required|numeric",
            "duration" => "required|digits:value",
            "category_id" => "required",

        ],[ 
            "title.required"=>"Поле обязательно для заполнения",
            "description.required"=>"Поле обязательно для заполнения",
            "cost.required"=>"Поле обязательно для заполнения",
            "duration.required"=>"Поле обязательно для заполнения",
            "category_id.required"=>"Поле обязательного заполнения",
            
            "title.max"=>"Название курса должно содержать не больше 50 символов",
            
            "cost.numeric"=>"Цена должна состоять из цифр",

        ]);

        $course_info = $request->all();

        Course::create([
            "title"=> $course_info["title"],
            "description"=> $course_info["description"],
            "cost"=> $course_info["cost"],
            "duration"=> $course_info["duration"],
            "category_id"=> $course_info["category"],

        ]);

        return redirect("/admin");
    }

    public function create_categories(Request $request)
    {
        $request->validate([
            "title" => "required|max:50",
        ], [
            "title.required"=>"Поле обязательного заполнения",
            "title.max"=>"Название должно содержать максимум 50 символов",
            
        ]);

        $category_info = $request->all();

        Category::create([
            "title"=> $category_info["title"],
        ]);

        return redirect("/admin");
    }
}


