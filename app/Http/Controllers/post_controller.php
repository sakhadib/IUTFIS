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




    // News


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
                'post' => null
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
        $post->executive_id = session('member_id');
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
        $posts = Post::where('executive_id', $member->id)->where('type', 'N')->get();

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

        if(!$post || $post->executive_id != $member->id){
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


    public function updateNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required'
        ]);

        $member = Member::find(session('member_id'));

        $category = Category::where('name', $request->input('category'))->first();
        if(!$category){
            $newcategory = new Category;
            $newcategory->name = $request->input('category');
            $newcategory->save();

            $category = Category::where('name', $request->input('category'))->first();
        }

        $post = Post::find($request->input('id'));

        if(!$post || $post->executive_id != $member->id){
            return redirect('reporter/news')->with('error', 'You are not authorized to edit this news');
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $category->id;
        $post->save();

        return redirect('reporter/news')->with('success', 'News updated successfully');
    }





    // Articles

    public function createArticle()
    {       
        
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to create articles');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $categories = Category::all();

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'categories' => $categories,
                'destination' => 'createArticles',
                'post' => null
            ]
    );
    }


    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required'
        ]);


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
        $post->executive_id = session('member_id');
        $post->type = 'Ar';
        $post->is_approved = true;
        $post->save();

        return redirect('reporter/articles')->with('success', 'Article created successfully');
    }


    public function articles()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to view articles');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $posts = Post::where('executive_id', $member->id)->where('type', 'Ar')->get();

        return view('post.news',
            [
                'member' => $member,
                'executive' => $executive,
                'posts' => $posts,
                'type' => 'Articles'
            ]
    );
    }


    public function editArticle($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to edit articles');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $post = Post::find($id);

        if(!$post || $post->executive_id != $member->id){
            return redirect('reporter/articles')->with('error', 'You are not authorized to edit this article');
        }

        $categories = Category::all();

        $post->category = Category::find($post->category_id);

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'post' => $post,
                'categories' => $categories,
                'destination' => 'editArticle'
            ]
    );
    }


    public function updateArticle(Request $request)
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

        $post = Post::find($request->input('id'));

        if(!$post || $post->executive_id != $executive->id){
            return redirect('reporter/articles')->with('error', 'You are not authorized to edit this article');
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $category->id;
        $post->save();

        return redirect('reporter/articles')->with('success', 'Article updated successfully');
    }






    // Announcements An

    public function createAnnouncement()
    {       
        
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to create announcements');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $categories = Category::all();

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'categories' => $categories,
                'destination' => 'createAnnouncements',
                'post' => null
            ]
    );
    }


    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $executive = Executive::find(session('executive_id'));
        
        $category = Category::where('name', 'Announcement')->first();

        if(!$category){
            $newcategory = new Category;
            $newcategory->name = 'Announcement';
            $newcategory->save();

            $category = Category::where('name', 'Announcement')->first();
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $category->id;
        $post->executive_id = session('member_id');
        $post->type = 'An';
        $post->is_approved = true;
        $post->save();

        return redirect('reporter/announcements')->with('success', 'Announcement created successfully');
    }



    public function announcements()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to view announcements');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $posts = Post::where('executive_id', $member->id)->where('type', 'An')->get();

        return view('post.news',
            [
                'member' => $member,
                'executive' => $executive,
                'posts' => $posts,
                'type' => 'Announcements'
            ]
    );
    }



    public function editAnnouncement($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        if(session('reporter') == false){
            return redirect('login')->with('error', 'You are not authorized to edit announcements');
        }

        $member = Member::find(session('member_id'));
        $executive = Executive::find(session('executive_id'));
        $post = Post::find($id);

        if(!$post || $post->executive_id != $member->id){
            return redirect('reporter/announcements')->with('error', 'You are not authorized to edit this announcement');
        }

        $categories = Category::all();

        $post->category = Category::find($post->category_id);

        return view('post.create_news',
            [
                'member' => $member,
                'executive' => $executive,
                'post' => $post,
                'categories' => $categories,
                'destination' => 'editAnnouncement'
            ]
    );
    }


    public function updateAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $member = Member::find(session('member_id'));

        $category = Category::where('name', $request->input('category'))->first();
        if(!$category){
            $newcategory = new Category;
            $newcategory->name = $request->input('category');
            $newcategory->save();

            $category = Category::where('name', $request->input('category'))->first();
        }

        $post = Post::find($request->input('id'));

        if(!$post || $post->executive_id != $member->id){
            return redirect('reporter/announcements')->with('error', 'You are not authorized to edit this announcement');
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $category->id;
        $post->save();

        return redirect('reporter/announcements')->with('success', 'Announcement updated successfully');
    }






    public function deletePost($id)
    {
        $post = Post::find($id);

        if($post == null){
            return redirect('reporter/news')->with('error', 'Post not found.');
        }

        if($post->executive_id != session('member_id')){
            return redirect('reporter/news')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect('reporter/news')->with('success', 'Post deleted successfully.');
    }
}
