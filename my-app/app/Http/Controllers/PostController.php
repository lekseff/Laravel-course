<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
//        $category = Category::find(1);
//        $post = Post::class::find(3);
//        $tag = Tag::class::find(2);
//        dd($tag->posts->toArray());
//        dd($post->tags->toArray());
//        dd($post->category);
//        dd($category->posts);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate(
            [
                'author' => 'string',
                'comment' => 'string',
                'category_id' => 'string',
                'tags' => ''
            ]
        );
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::class::create($data);
//        $post->tags()->attach($tags); // Добавляет теги в бд
        foreach ($tags as $tag) {
            PostTag::class::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id
            ]);
        }
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
//        $post = Post::findOrFail($post);
//        return view('posts.show', compact('post'));
        $category = $post->category->title;
        return view('posts.show', compact('post', 'category'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact(['post', 'categories','tags']));
    }

    public function update(Post $post)
    {
        $data = request()->validate(
            [
                'author' => 'string',
                'comment' => 'string',
                'category_id' => 'string',
                'tags' => ''
            ]
        );
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags); // Обновляет список тегов в базе
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }


}
