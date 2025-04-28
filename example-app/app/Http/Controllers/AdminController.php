<?php

namespace App\Http\Controllers;

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

    Team::create([
        'name' => $request->name,
        'position' => $request->position,
        'specialty' => $request->specialty,
        'image' => $request->image, // مسیر عکس
        'description' => $request->description, // متن با HTML
    ]);

    return redirect()->route('teams.index')->with('success', 'عضو تیم با موفقیت اضافه شد.');
}

//   public function InsertTeamMember()
//   {
//     return view("AdminViews.Team.")
//   }

}
