<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Achievement;
use App\Models\Event;
use App\Models\Workshop;
use App\Models\Post;

class about_controller extends Controller
{
    public function index()
    {
        $total_member_count = Member::count(); 

        $total_news_count = Post::where('type', 'N')->count();

        $total_article_count = Post::where('type', 'Ar')->count();

        $total_event_count = Event::count();

        $total_workshop_count = Workshop::count();

        $total_achievement_count = Achievement::count();
        
        
        
        return view('about',
        [
            'total_member_count' => $total_member_count,
            'total_news_count' => $total_news_count,
            'total_article_count' => $total_article_count,
            'total_event_count' => $total_event_count,
            'total_workshop_count' => $total_workshop_count,
            'total_achievement_count' => $total_achievement_count,
            'header' => 'About FIS',
        ]
    );
    }
}
