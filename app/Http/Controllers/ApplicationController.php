<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create_application(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "name" => "required|max:50"
        
        ],[ 
            "email.required"=>"Поле обязательно для заполнения",
            "name.required"=>"Поле обязательно для заполнения",
            "email.max"=>"Имя должно содержать не больше 50 символов",
            "email.email"=>"Адрес электронной почты должен быть корректного типа",
        ]);


        $application_info = $request->all();

        Application::create([
            "email"=> $application_info["email"],
            "name"=> $application_info["name"],
            "course_id"=> $application_info["course"],
        ]);

        return redirect("/");
    }

    public function confirm($id_application)
    {
        $application = Application::find($id_application);

        $application->is_confirm = 1;

        $application->save();
        
        return redirect("/admin");
    }
}

// Валидэйт это метод класса реквест, вызывает экземпляр класса (класса реквест метода валидэйт и сохраняем в переменную), ассоциативный массив 
// name взят из формы, где инпут
// Методы и свойства с маленькой буквы, а с большой классы 