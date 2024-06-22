<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Panel;
use App\Models\Executive;

class member_controller extends Controller
{
    /**
     * Display a listing of the members.
     */
    public function index(){
        $members = Member::orderBy('name')->get();
        return view('admin.members', ['members' => $members]);
    }


    public function createform()
    {
        return view('admin.member_create');
    }

    /**
     * Store a newly created member in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:members,email',
            'fullname' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dept' => 'required|string|max:255',
            'std_id' => 'required|string|max:255|unique:members,student_id',
            'pass' => 'required|string|min:8',
        ]);

        // Handle the file upload for the profile picture
        $profilePicPath = 'default.jpg';
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profilePicPath = $file->storeAs('profile_pics', $fileName, 'public');
        }
        
        // Create a new member instance and save it to the database
        $member = new Member();
        $member->name = $request->input('fullname');
        $member->email = $request->input('email');
        $member->photo = $profilePicPath;
        $member->student_id = $request->input('std_id');
        $member->department = $request->input('dept');
        $member->password = md5($request->input('pass'));
        $member->is_password_changed = false; // Default value
        $member->save();

        // Redirect or return a response
        return redirect('/admin/members')->with('success', 'Member created successfully!');
    }

    public function panalcreateform()
    {
        return view('admin.panel_create');
    }

    public function panelstore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'panel_year' => 'required|integer',
        ]);

        // Create a new panel instance and save it to the database
        $panel = new Panel();
        $panel->host_year = $request->input('panel_year');
        $panel->president_message = "default";
        $panel->save();

        // Redirect or return a response
        return redirect('/admin/members')->with('success', 'Panel created successfully!');
    }


    public function makeexecutive($id)
    {
        $member = Member::find($id);
        $panel = Panel::orderBy('host_year', 'desc')->first();
        if ($member == null) {
            return redirect('/admin/members')->with('error', 'Member not found!');
        }

        return view('admin.make_executive', ['member' => $member]);
    }
}
