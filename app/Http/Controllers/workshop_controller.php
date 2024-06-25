<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class workshop_controller extends Controller
{
    public function createWorkshop()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }
        
        $members = Member::All();

        return view('post.createWorkshop',
            [
                'members' => $members
            ]
    );
    }
}
