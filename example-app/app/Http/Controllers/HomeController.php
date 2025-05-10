<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ContactToUs;
use App\Models\PricingPlans;
use App\Models\Resume;
use App\Models\ResumeImage;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        $teams= Team::all();
        $service = Service::all();
        $plans = PricingPlans::all();
        $resumes = Resume::all();
        return view('index', compact('service' , 'teams' , 'plans', 'resumes'));
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

public function OurProjects()
{
    $resumes = Resume::all();
    
    return view('UserViews.OurProjects' , compact('resumes'));
}

public function show($id)
{
    $resume = Resume::with('images')->findOrFail($id);
    
    return view('UserViews.show', compact('resume'));
}

public function Blog()
{
    $post = BlogPost::all();
    return view('UserViews.Blog' , compact('post'));
}

 public function BlogDetail($slug)
    {
        $lastPost = BlogPost::latest()->take(3)->get();
        $post = BlogPost::where('slug', $slug)->firstOrFail();
    
        // گرفتن پست‌های قبلی و بعدی
        $previous = BlogPost::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        if (!$previous) {
            $previous = BlogPost::orderBy('id', 'desc')->first();
        }
    
        $next = BlogPost::where('id', '>', $post->id)->orderBy('id')->first();
        if (!$next) {
            $next = BlogPost::orderBy('id')->first();
        }
    
        return view('UserViews.BlogDetail', compact('post', 'lastPost', 'previous', 'next'));
    }















}
