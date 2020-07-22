<?php

namespace App\Http\Controllers;

use App\Post;
//use App\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return view('posts.index', compact('posts'));
    }
    public function all()
    {
        $posts = Post::all();
//        dd($posts);
        return view('posts.all', compact('posts'));
    }
    public function view($url)
    {
        $post = Post::where('url', $url)->firstOrFail();
        $title = $post->title . ' | سئولب';
        $description = $post->description;
        $logo = env('APP_URL') . '/img/postImages/' . $post->image;
        $url = 'https://www.grandima.com/' . $post->url;
//        dd($description);
        return view('posts.view', compact('title', 'description' , 'logo', 'url' , 'post'));
    }
//    public function add()
//    {
//        $tags = Tag::all();
//        return view('posts.add', compact('tags'));
//    }
    public function add()
    {
        return view('posts.add');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->url = $data['url'];
        $data['url'] = str_replace(" " , '-' , $data['url']);
        $data['url'] = str_replace('_' , '-' , $data['url']);
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = uniqid();
            $fileName .= '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . env('BASE_URL') . '/img/postImages', $fileName);
            $post->image = $fileName;
        }
        $post->short_description = $data['short_description'];
        $post->description = $data['description'];
        $post->save();
//        $tagIds = $request->input('tags');
//        $post->tags()->attach($tagIds);
        flash('مقاله با موفقیت ثبت شد')->success();
        return redirect('/posts/all');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->title = $data['title'];
        $data['url'] = str_replace(" " , '-' , $data['url']);
        $data['url'] = str_replace('_' , '-' , $data['url']);
        $post->url = $data['url'];
        $post->short_description = $data['short_description'];
        $post->description = $data['description'];
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = uniqid();
            $fileName .= '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . env('BASE_URL') . '/img/postImages', $fileName);
            $post->image = $fileName;
        }
        $post->save();
        flash('مقاله با موفقیت ویرایش شد')->success();
        return redirect('/posts/all');
    }

    public function delete(Post $post)
    {
        $post->delete();
        flash('مقاله حذف شد')->success();
        return redirect('/posts/all');
    }
}
