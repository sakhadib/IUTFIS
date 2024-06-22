<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Executive;

class login_controller extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'sid' => 'required',
            'password' => 'required|string'
        ]);

        $sid = $request->input('sid');
        $password = md5($request->input('password'));

        $member = Member::where('student_id', $sid)->where('password', $password)->first();

        if(!$member){
            return redirect('login')->with('error', 'Invalid student ID or password');
        }

        $executive = Executive::where('member_id', $member->id)->orderBy('created_at')->first();

        if(!$executive){
            return redirect('login')->with('error', 'You are not authorized to login');
        }

        if($member->is_password_changed == false){
            return redirect('/changepassword')->with('member', $member);
        }

        $is_admin = false;
        $is_reporter = false;

        if($executive->is_admin == true){
            $is_admin = true;
        }

        if($executive->is_reporter == true){
            $is_reporter = true;
        }

        if($is_admin == false && $is_reporter == false){
            return redirect('login')->with('error', 'Boy do hardwork and become admin or reporter to enter the ship');
        }

        session([
            'member_id' => $member->id,
            'executive_id' => $executive->id,
            'admin' => $is_admin,
            'reporter' => $is_reporter
        ]);

        if($is_admin && $is_reporter){
            return redirect('/selector');
        }

        if($is_admin){
            return redirect('admin/members');
        }

        if($is_reporter){
            return redirect('reporter/dashboard');
        }

        
    }

    public function selector(){
        if(session('admin') == false && session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to view this page');
        }

        return view('selector');
    }


    public function changePassword(){
        if(session('member') == null){
            return redirect('login')->with('error', 'Bad try boy ! first prove yourself');
        }

        $member = session('member');
        return view('change_password', ['member' => $member]);
    }


    public function storePassword(Request $request){
        $request->validate([
            'password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);

        $password = $request->input('password');
        $confirm_password = $request->input('password_confirmation');

        if($password != $confirm_password){
            return redirect('changepassword')->with('error', 'Password and confirm password does not match');
        }

        $member = Member::find($request->input('member_id'));
        $member->password = md5($password);
        $member->is_password_changed = true;
        $member->save();

        return redirect('login')->with('success', 'Password changed successfully');
    }


    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
