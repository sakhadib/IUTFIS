<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Member;
use App\Models\Executive;
use App\Models\Category;
use App\Models\Panel;


class postview_controller extends Controller
{
    public function news()
    {
        $post = Post::where('type', 'N')->orderBy('created_at', 'desc')->get();
        $post_count = Post::where('type', 'N')->count();

        $modifiedNewsArray = [];

        foreach ($post as $news) {
            $executive = Executive::where('id', $news->executive_id)->first();
            $member = Member::where('id', $executive->member_id)->first();
            $category = Category::where('id', $news->category_id)->first();
            $news->member = $member;
            $news->created_at->addHours(6);
            $news->category = $category;
            array_push($modifiedNewsArray, $news);
        }

        return view('allpost', 
            [
                'posts' => $modifiedNewsArray,
                'type' => 'News',
                'post_count' => $post_count
            ]);
    }




    public function articles(){
        $post = Post::where('type', 'Ar')->orderBy('created_at', 'desc')->get();
        $post_count = Post::where('type', 'Ar')->count();

        $modifiedNewsArray = [];

        foreach ($post as $news) {
            $executive = Executive::where('id', $news->executive_id)->first();
            $member = Member::where('id', $executive->member_id)->first();
            $category = Category::where('id', $news->category_id)->first();
            $news->member = $member;
            $news->created_at->addHours(6);
            $news->category = $category;
            array_push($modifiedNewsArray, $news);
        }

        return view('allpost', 
            [
                'posts' => $modifiedNewsArray,
                'type' => 'Articles',
                'post_count' => $post_count
            ]);
    }


    public function announcements(){
        $post = Post::where('type', 'An')->orderBy('created_at', 'desc')->get();
        $post_count = Post::where('type', 'An')->count();

        $modifiedNewsArray = [];

        foreach ($post as $news) {
            $executive = Executive::where('id', $news->executive_id)->first();
            $member = Member::where('id', $executive->member_id)->first();
            $category = Category::where('id', $news->category_id)->first();
            $news->member = $member;
            $news->created_at->addHours(6);
            $news->category = $category;
            array_push($modifiedNewsArray, $news);
        }

        return view('allpost', 
            [
                'posts' => $modifiedNewsArray,
                'type' => 'Announcements',
                'post_count' => $post_count
            ]);
    }


    public function newsdetails($id){
        $post = Post::where('id', $id)->first();
        $executive = Executive::where('id', $post->executive_id)->orderBy('created_at', 'desc')->first();
        $panel = Panel::where('id', $executive->panel_id)->first();
        $member = Member::where('id', $executive->member_id)->first();
        $category = Category::where('id', $post->category_id)->first();
        $post->member = $member;
        $post->executive = $executive;
        $post->created_at->addHours(6);
        $post->category = $category;
        $post->panel = $panel;


        $more_posts = Post::where('type', 'N')->where('id', '!=', $id)->where('executive_id', $executive->id)->orderBy('created_at', 'desc')->take(3)->get();

        return view('postdetails', 
            [
                'post' => $post,
                'more_posts' => $more_posts
            ]);
    }


    public function articledetails($id){
        $post = Post::where('id', $id)->first();
        $executive = Executive::where('id', $post->executive_id)->orderBy('created_at', 'desc')->first();
        $panel = Panel::where('id', $executive->panel_id)->first();
        $member = Member::where('id', $executive->member_id)->first();
        $category = Category::where('id', $post->category_id)->first();
        $post->member = $member;
        $post->executive = $executive;
        $post->created_at->addHours(6);
        $post->category = $category;
        $post->panel = $panel;


        $more_posts = Post::where('type', 'Ar')->where('id', '!=', $id)->where('executive_id', $executive->id)->orderBy('created_at', 'desc')->take(3)->get();

        return view('postdetails', 
            [
                'post' => $post,
                'more_posts' => $more_posts
            ]);
    }

}
