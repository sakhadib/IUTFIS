<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class member_controller extends Controller
{
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
        return redirect('/admin/createmember');
    }
}
