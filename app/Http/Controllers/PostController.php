<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact( 'categories','tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function comment(Post $post)
    {
        $data = request()->validate([
            'message' => 'string',
            'post_id' => 'integer',
        ]);
        $data['post_id'] = $post->id;
        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }

    public function show(Post $post, Comment $comments)
    {
        $comments = Comment::all();
        return view('post.show', compact('post', 'comments'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'text',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }


    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
           dd('restore');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'some title'
        ],[
            'title' =>'some title',
            'post_content' =>'some content',
            'image' =>'update',
            'likes' =>100,
            'is_published' => 0,
        ]);
        dump($post->post_content);
        dd(11111);
    }
    public function updateOrCreate()
    {
        $anotherPost = (['title' =>'some anotherTitle',
            'post_content' =>'some anotherContent',
            'image' =>'anotherUpdate',
            'likes' =>100,
            'is_published' => 0,]);
        $post = Post::updateOrCreate([
            'title' => 'some title blabla'
        ],[
            'title' =>'some title blabla',
            'post_content' =>'some anotherContent blabla',
            'image' =>'anotherUpdate',
            'likes' =>100,
            'is_published' => 0
        ]);
        dump($post->post_content);
        dd('win');
    }
}
