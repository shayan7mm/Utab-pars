<?php

namespace App\Http\Controllers;

use App\Models\ContactToUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        return view('index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('user')); // بعد از خروج کاربر را به صفحه لاگین بفرست
    }

    public function contactToUs(Request $request)
{
    {   $request -> validate([
        'name' => 'required|string|min:3',
        'number'=>'required',
        'email' => 'required|email',
        'message'=>'required',
    ]);
    
   
        $request->input('name');
        $request->input('email');
        $request->input('number');
        $request->input('message');
       
        $ContacToUs =new ContactToUs();
        
        $ContacToUs->name = $request->name;
        $ContacToUs->email = $request->email;
        $ContacToUs->number = $request->number;
        $ContacToUs->message = $request->message;
        
        $ContacToUs->save();
        return redirect()->route('user')->with('success' , 'پیام شما با موفقیت ارسال شد');
    }
}
}
