<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Executive;
use App\Models\Category;
use App\Models\Post;

class post_controller extends Controller
{
    public function index()
    {
        return view('post.index');
    }


    public function createNews()
    {       
        
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to create news');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $categories = Category::all();

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'categories' => $categories,
                'destination' => 'createnews',
            ]
    );
    }


    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required'
        ]);

        $executive = Executive::find(session('executive_id'));

        $category = Category::where('name', $request->input('category'))->first();
        if(!$category){
            $newcategory = new Category;
            $newcategory->name = $request->input('category');
            $newcategory->save();

            $category = Category::where('name', $request->input('category'))->first();
        }

        

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $category->id;
        $post->executive_id = $executive->id;
        $post->type = 'N';
        $post->is_approved = true;
        $post->save();

        return redirect('reporter/news')->with('success', 'News created successfully');
    }


    public function news()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to view news');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $posts = Post::where('executive_id', $executive->id)->where('type', 'N')->get();

        return view('post.news',
            [
                'member' => $member,
                'executive' => $executive,
                'posts' => $posts,
                'type' => 'News'
            ]
    );
    }


    public function editNews($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to edit news');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $post = Post::find($id);

        if(!$post || $post->executive_id != $executive->id){
            return redirect('reporter/news')->with('error', 'You are not authorized to edit this news');
        }

        $categories = Category::all();

        $post->category = Category::find($post->category_id)->name;

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'post' => $post,
                'categories' => $categories,
                'destination' => 'editnews'
            ]
    );
    }
}
