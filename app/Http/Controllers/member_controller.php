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
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $members = Member::orderBy('name')->get();
        return view('admin.members', ['members' => $members]);
    }


    public function createform()
    {
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }
        
        return view('admin.member_create');
    }

    /**
     * Store a newly created member in the database.
     */
    public function store(Request $request)
    {
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }
        
        
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
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }
        
        return view('admin.panel_create');
    }

    public function panelstore(Request $request)
    {
        // Validate the incoming request data
        
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

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
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }
        
        
        $member = Member::find($id);
        $panels = Panel::orderBy('host_year', 'desc')->get();
        if ($member == null) {
            return redirect('/admin/members')->with('error', 'Member not found!');
        }

        $executive = Executive::where('member_id', $id)->first();

        return view('admin.make_executive', ['member' => $member, 'panels' => $panels]);
    }

    public function storeexecutive(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        
        // die();
        
        
        // Validate the incoming request data
         $request->validate([
            'member_id' => 'required',
            'year' => 'required|integer',
            'position' => 'required|string',
            'isreporter' => 'sometimes',
            'isadmin' => 'sometimes',
            'panel_id' => 'required',
        ]);

        $existing_executive = Executive::where('member_id', $request->input('member_id'))
            ->where('panel_id', $request->input('panel_id'))
            ->first();

        if ($existing_executive != null) {
            $existing_executive->position = $request->input('position');
            $existing_executive->year = $request->input('year');
            $existing_executive->is_reporter = $request->boolean('isreporter');
            $existing_executive->is_admin = $request->boolean('isadmin');
            $existing_executive->save();

            return redirect('/admin/members')->with('success', 'Executive updated successfully!');
        }

        // Create the executive
        $executive = new Executive();
        $executive->member_id = $request->input('member_id');
        $executive->panel_id = $request->input('panel_id');
        $executive->position = $request->input('position');
        $executive->year = $request->input('year'); 
        $executive->is_reporter = $request->boolean('isreporter');
        $executive->is_admin = $request->boolean('isadmin');
        $executive->save();

        // Redirect or respond as necessary
        return redirect('/admin/members')->with('success', 'Executive created successfully!');
    }
}

