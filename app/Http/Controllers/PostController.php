<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // PostConstroller pubblico per leggere i dati
    public function index()
    {
        // così faccio caricare a vue anche i dati delle foreign key "category" e "user"
        $postsList = Post::with('category')->with('user')->with('tags')->paginate(4);

        // uguale a return response()->json($postsList);
        return $postsList;
    }

    public function show($id)
    {
        $post = Post::where("id", $id)->first();
        return $post;
    }
}
