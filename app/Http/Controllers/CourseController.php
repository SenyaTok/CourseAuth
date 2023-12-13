<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(3);

        $categories = Category::all();  // 

        return view("index", compact("courses","categories")); //
    }

    public function category_filter($id)    //
    {
        $category = Category::findOrFail($id);  //

        $courses = $category->courses()->paginate(3);   //

        return view("category_filter", compact("courses","category"));  //
    }

    public function create_course(Request $request)
    {
       
        $request->validate([
            "title" => "required|max:50",
            "description" => "required",
            "cost" => "required|numeric",
            "duration" => "required|numeric",
            "category_id" => "required",

        ],[ 
            "title.required"=>"Поле обязательно для заполнения",
            "description.required"=>"Поле обязательно для заполнения",
            "cost.required"=>"Поле обязательно для заполнения",
            "duration.required"=>"Поле обязательно для заполнения",
            "category_id.required"=>"Поле обязательного заполнения",
            
            "title.max"=>"Название курса должно содержать не больше 50 символов",
            
            "cost.numeric"=>"Цена должна состоять из цифр",
            "duration.numeric"=>"Длительность должна состоять из цифр",


        ]);

        $course_info = $request->all();
        // dd($course_info);


        Course::create([
            "title"=> $course_info["title"],
            "description"=> $course_info["description"],
            "cost"=> $course_info["cost"],
            "duration"=> $course_info["duration"],
            "category_id"=> $course_info["category_id"],

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


