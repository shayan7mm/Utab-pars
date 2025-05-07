<?php

namespace App\Http\Controllers;

use App\Models\ContactToUs;
use App\Models\Service;
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

    public function AllServices()
    {
        $services = Service::all();
        return view('AdminViews.Services.Services' , compact('services'));
    }

    public function InsertService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $service = new Service();
        $service->name = $request->name;
        $service->alt = $request->alt;
        $service->description = $request->description;
        if($request->featured_image)
        {
            $img = 'img/services'.$service->featured_image;
            
        $path = time() .'-'. $request->featured_image->getClientOriginalName();
        $request->featured_image->move(public_path('img/services'), $path);
        $service->featured_image = $path;
        }
    

        $service->save();
    
        return redirect()->back()->with('success', 'خدمت با موفقیت ذخیره شد.');
    }

    public function DeleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('AllServices')->with('success', 'خدمات حذف شد.');
    }
    


















public function test()
{
    return view('AdminViews.Team.test');
}

}
