<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepostRequest $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->id(),
            'price' => $request->price,

        ]);

        if ($request->file('image')) {
            $ext = $request->file('image')->extension();
            $content = file_get_contents($request->file('image'));
            $filename = Str::random(35);
            $path = "images/$filename.$ext";
            Storage::disk('public')->put($path, $content);
            $post->update(['image' => $path]);
        }


        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, Post $post)
    {
        $post->update(['name' => $request->name, 'description' => $request->description, 'category' => $request->category_id, 'price' => $request->price]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($post->image);
            $ext = $request->file('image')->extension();
            $content = file_get_contents($request->file('image'));
            $filename = Str::random(35);
            $path = "images/$filename.$ext";
            Storage::disk('public')->put($path, $content);
            $post->update(['image' => $path]);
        }

        
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
