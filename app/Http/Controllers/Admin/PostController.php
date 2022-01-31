<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();
        $post->fill($request->all());
        $post->user_id = Auth::user()->id;

        // $post->image = Storage::put("posts", $data["image"]);
        if ($request->file("image")) {
            $post->image = Storage::put("posts", $data["image"]);
        }

        $post->save();

        $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        // dump($request->all());
        // return;

        // dd($request->file());

        $data = $request->all();
        $oldImage = $post->image;

        $post->update($data);

        $post->image = Storage::put("posts", $data["image"]);
        if ($request->file("image")) {
            if ($oldImage) {
                Storage::delete($oldImage);
            }

            $post->image = $request->file("image")->store("posts");
        }

        $post->save();

        // sync cancella in automatico i tag che già esistono e mette quelli nuovi
        $post->tags()->sync($data["tags"]);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where("id", $id)->first();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index')->with(["status" => "Post cancellato correttamente"]);
    }
}
