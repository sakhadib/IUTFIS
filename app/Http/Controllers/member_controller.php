<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Panel;
use App\Models\Executive;
use App\Models\Editlog;

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

        $executive = Executive::where('member_id', $id)->orderBy('created_at', 'desc')->first();
        $executive_panel = Panel::where('id', $executive->panel_id)->first();

        return view('admin.make_executive', ['member' => $member, 'panels' => $panels, 'executive' => $executive, 'executive_panel' => $executive_panel]);
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

            $editlog = new Editlog();
            $editlog->member_id = session('member_id');
            $editlog->model = 'executive';
            $editlog->details = 'Updated executive ' . $existing_executive->id;
            $editlog->save();


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


    public function executives(){
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $executives = Executive::orderBy('created_at', 'desc')->get();

        $modified_executives = [];

        foreach ($executives as $executive) {
            $member = Member::find($executive->member_id);
            $panel = Panel::find($executive->panel_id);

            $executive->member = $member;
            $executive->panel = $panel;

            $modified_executives[] = $executive;
        }

        return view('admin.executives', 
            ['executives' => $modified_executives]
        );
    }


    public function reporters(){
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $reporters = Executive::where('is_reporter', true)->orderBy('created_at', 'desc')->get();

        $modified_reporters = [];

        foreach ($reporters as $reporter) {
            $member = Member::find($reporter->member_id);
            $panel = Panel::find($reporter->panel_id);

            $reporter->member = $member;
            $reporter->panel = $panel;

            $modified_reporters[] = $reporter;
        }

        return view('admin.reporters', 
            ['reporters' => $modified_reporters]
        );
    }

    public function removereporter($id){
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $reporter = Executive::find($id);

        if ($reporter == null) {
            return redirect('/admin/reporters')->with('error', 'Reporter not found!');
        }

        $reporter->is_reporter = false;
        $reporter->save();

        $editlog = new Editlog();
        $editlog->member_id = session('member_id');
        $editlog->model = 'executive';
        $editlog->details = 'Removed reporter ' . $reporter->id;
        $editlog->save();

        return redirect('/admin/reporters')->with('success', 'Reporter removed successfully!');
    }



    public function admins(){
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $admins = Executive::where('is_admin', true)->orderBy('created_at', 'desc')->get();

        $modified_admins = [];

        foreach ($admins as $admin) {
            $member = Member::find($admin->member_id);
            $panel = Panel::find($admin->panel_id);

            $admin->member = $member;
            $admin->panel = $panel;

            $modified_admins[] = $admin;
        }

        return view('admin.admins', 
            ['admins' => $modified_admins]
        );
    }


    public function removeadmin($id){
        if(session('admin') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        $admin = Executive::find($id);

        if ($admin == null) {
            return redirect('/admin/admins')->with('error', 'Admin not found!');
        }

        $admin->is_admin = false;
        $admin->save();

        $editlog = new Editlog();
        $editlog->member_id = session('member_id');
        $editlog->model = 'executive';
        $editlog->details = 'Removed admin ' . $admin->id;
        $editlog->save();

        return redirect('/admin/admins')->with('success', 'Admin removed successfully!');
    }
}

