<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Member;
use App\Models\Executive;


class postview_controller extends Controller
{
    public function news()
    {
        $post = Post::where('type', 'N')->get();

        $modifiedNewsArray = [];

        foreach ($post as $news) {
            $executive = Executive::where('id', $news->executive_id)->first();
            $member = Member::where('id', $executive->member_id)->first();
            $news->member = $member;
            array_push($modifiedNewsArray, $news);
        }

        return view('allpost', 
            [
                'posts' => $modifiedNewsArray,
                'type' => 'News',
                'bg' => 'newsbg.jpg'
            ]);
    }
}
