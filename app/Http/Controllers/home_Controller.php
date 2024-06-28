<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Workshop;
use App\Models\Member;

class home_Controller extends Controller
{
    public function index()
    {
        $first_3_news = Post::where('type', 'N')->orderBy('created_at', 'desc')->take(3)->get();

        $closest_workshop = Workshop::where('start_date', '>', now())->orderBy('start_date', 'asc')->first();

        $first_3_Articles = Post::where('type', 'Ar')->orderBy('created_at', 'desc')->take(3)->get();

        $articles = [];

        foreach ($first_3_Articles as $article) {
            $article->content = substr($article->content, 0, 120);
            $member = Member::find($article->executive_id);

            $modArticle = (object)[
                'article' => $article,
                'member' => $member
            ];

            array_push($articles, $modArticle);
        }

        return view('home',
            [
                'newss' => $first_3_news,
                'workshop' => $closest_workshop,
                'articles' => $articles
            ]
        );
    }
}
