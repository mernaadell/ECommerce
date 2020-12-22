<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function  getLogin(){

        return view('admin.auth.login');
    }

    public function save(){

        $admin = new App\Models\Admin();
        $admin -> name ="Ahmed Emam";
        $admin -> email ="ahmed@gmail.com";
        $admin -> password = bcrypt("Ahmed Emam");
        $admin -> save();

    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;
            //search in db 
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');//aro7 l route
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);//lw fe error hyrga3 l page elii fatet w y7ot fe variable error w yst5dmo hnak
//    ->withInput($request->all());lw 3wzah yrga3 b kol bayanat
    }
}
