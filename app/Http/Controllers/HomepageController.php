<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\User;
use App\Post;
use App\Recipe;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
        $recipes = Recipe::orderBy('created_at', 'desc')->take(6)->get();

        return view('homepage.index')->with('posts', $posts)->with('recipes', $recipes);
    }
}
