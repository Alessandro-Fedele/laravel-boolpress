<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        $tags = Tag::orderBy("name")->get();

        // response()->json($tags);
        return $tags;
    }
}
