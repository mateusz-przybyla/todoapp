<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Auth};

class BlogController extends Controller
{
    protected $validationRules = ["description" => "required", "post" => "required"];

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(3);

        return view('blog.index', compact('posts'));
    }

    public function store(Request $request)
    {
        //Log::info($request);

        $validatedData = $request->validate($this->validationRules);
        $validatedData['user_id'] = Auth::id();

        Post::create($validatedData);

        return redirect()->route("blog.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("blog.index");
    }

    public function edit(Post $post){
        return view("blog.edit", ["post" => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $validatedData = $request->validate($this->validationRules);

        $post->update($validatedData);

        return redirect()->route("blog.index");
    }
}
