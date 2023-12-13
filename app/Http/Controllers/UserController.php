<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function signin(){
        return view("signin");
    }

    public function signup(){
        return view("signup");
    }

    public function signout(){
        // return view("signout");
    }
    
    public function signin_valid(Request $request)
    {
        $user = $request->all();    //получаем все данные из запроса с помощью метода $request->all() и сохраняем их в переменную $user.
        // dd($user);
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);
        $user = [
            "email"=> $request->email,
            "password"=> $request->password 
        ];

        if (Auth::attempt($user)) {
            return redirect("/")->with("success", "");
        } else {
            return redirect()->back()->with([
                "error" => "Неправильный логин и/или пароль!",
                "old_email" => $request->email
            ]);
        }
    }

    public function signup_valid(Request $request){

        $request->validate([
            "email"=> "required|email|unique:users",
            "username"=> "required",
            "password"=> "required",
            "confirm_pass"=> "required|same:password",
        ]);
        $user = $request->all();

        $check = User::create([
            "email"=> $user["email"],
            "name"=> $user["username"],
            "password"=> Hash::make($user["password"]),
        ]);

        return redirect("/")->with("success","");
        
    }

}

