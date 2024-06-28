<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel;
use App\Models\Member;
use App\Models\Executive;
use App\Models\Post;
use App\Models\Speaker;

class panel_controller extends Controller
{
    
    public function index(){

        $panels = Panel::orderBy('created_at', 'desc')->get();

        $mod_panels = [];

        foreach($panels as $panel){
            $president = Executive::where('panel_id', $panel->id)->where('position', 'president')->first();
            $president_member = Member::where('id', $president->member_id)->first();

            $mod_panel = (object)[
                'panel' => $panel,
                'president' => $president_member,
            ];

            $mod_panels[] = $mod_panel;
        }
        
        return view('panel.index', ['panels' => $mod_panels]);
    }
    
    
    public function currentExecutives(){

        $current_panel = Panel::orderBy('created_at', 'desc')->first();
        $executives = Executive::where('panel_id', $current_panel->id)->orderBy('created_at', 'asc')->get();

        $mod_members = [];

        foreach($executives as $executive){
            $member = Member::where('id', $executive->member_id)->first();

            $mod_member = (object)[
                'member' => $member,
                'position' => $executive->position,
                'year' => $executive->year,
            ];


            $mod_members[] = $mod_member;
        }


        return view('panel.currentExecutives',
        
        [
            'executives' => $mod_members,
            'current_panel' => $current_panel
        ]
        
        );
    }


    public function executives($id){

        $panel = Panel::where('id', $id)->first();
        $executives = Executive::where('panel_id', $panel->id)->orderBy('created_at', 'asc')->get();

        $mod_members = [];

        foreach($executives as $executive){
            $member = Member::where('id', $executive->member_id)->first();

            $mod_member = (object)[
                'member' => $member,
                'position' => $executive->position,
                'year' => $executive->year,
            ];

            $mod_members[] = $mod_member;

        }

        return view('panel.currentExecutives',
        
        [
            'executives' => $mod_members,
            'current_panel' => $panel
        ]
        
        );
    }



    public function profile($id){

        $member = Member::where('id', $id)->first();
        $executive = Executive::where('member_id', $member->id)->orderBy('created_at', 'desc')->first();
        $panel = Panel::where('id', $executive->panel_id)->first();

        $newsCount = Post::where('executive_id', $member->id)->where('type', 'N')->count();
        $articleCount = Post::where('executive_id', $member->id)->where('type', 'Ar')->count();
        $speakerCount = Speaker::where('member_id', $member->id)->count();

        return view('panel.profile', 
            [
                'member' => $member,
                'executive' => $executive,
                'panel' => $panel,
                'newsCount' => $newsCount,
                'articleCount' => $articleCount,
                'speakerCount' => $speakerCount
            ]);
    }
}
