<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::orderBy("name")->get();

        // response()->json($categories);
        return $categories;
    }
}
