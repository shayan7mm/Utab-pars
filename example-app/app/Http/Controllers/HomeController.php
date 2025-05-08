<?php

namespace App\Http\Controllers;

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
}
