<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // PostConstroller pubblico per leggere i dati
    public function index(Request $request)
    {
        // category -> leggo la variabile dall' URL
        $category = $request->query("category");

        // tag -> leggo la variabile dall' URL
        // $tag = $request->query("tag");

        // così faccio caricare a vue anche i dati delle foreign key "category" e "user"
        $postsList = Post::with('category')->with('user')->with('tags');

        if ($category) {
            $postsList = $postsList->where('category_id', $category)->paginate(4);
        } else {
            $postsList = $postsList->paginate(4);
        }

        // uguale a return response()->json($postsList);
        return $postsList;
    }

    public function show($id)
    {
        $post = Post::where("id", $id)->first();
        return $post;
    }
}
