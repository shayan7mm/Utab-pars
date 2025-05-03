<?php

namespace App\Http\Controllers;

use App\Models\ContactToUs;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin()
    {
        return view('AdminViews.admin');
    }

    public function AddTeamMember()
    {
        $teams = Team::all();
        return view('AdminViews.Team.AddTeamMember' , compact('teams'));
    }


public function InsertTeamMember(Request $request)
{
    $request->validate([
        'name' => 'required',
        'position' => 'required',
        'specialty' => 'nullable',
        'image' => 'nullable|string',
        'description' => 'nullable|string',
    ]);

    // فقط نام فایل رو از URL جدا کن
    $imageName = basename($request->image);

    Team::create([
        'name' => $request->name,
        'position' => $request->position,
        'specialty' => $request->specialty,
        'image' => $imageName, // ذخیره فقط نام فایل
        'description' => $request->description,
    ]);

    return redirect()->route('AddTeamMember')->with('success', 'عضو تیم با موفقیت اضافه شد.');
}

public function DeleteTeamMember($id)
{
    $team = Team::findOrFail($id);
    $team->delete();

    return redirect()->route('AddTeamMember')->with('success', 'پست حذف شد.');
}

public function AllMessages()
{
    $message = contactToUs::all();
    return view('AdminViews.Message.Message' , compact('message'));
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

















public function test()
{
    return view('AdminViews.Team.test');
}

}
