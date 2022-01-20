<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // PostConstroller pubblico per leggere i dati
    public function index()
    {
        $postsList = Post::all();
        return $postsList;
    }
}
