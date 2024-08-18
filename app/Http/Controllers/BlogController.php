<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    protected $validationRules = ["description" => "required", "post" => "required"];

    public function index(){
        return view('blog.index')->with("posts", Post::all());
    }

    public function store(Request $request, Post $post)
    {
        //Log::info($request);

        $validatedData = $request->validate($this->validationRules);

        Post::create($validatedData);

        return redirect()->route("blog.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("blog.index");
    }

    public function update(Post $post, Request $request)
    {
        $validatedData = $request->validate($this->validationRules);

        $post->update($validatedData);

        return redirect()->route("blog.index");
    }
}
