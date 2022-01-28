<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::orderBy("name")->get();

        // response()->json($categories);
        return $categories;
    }

    function show($categoryId)
    {
        $category = Category::where("id", $categoryId)->with("posts")->first();

        if (!$category) {
            throw new HttpException(404);
        }
        return $category;
    }
}
