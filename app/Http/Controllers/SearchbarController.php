<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Post;
use App\Recipe;

class SearchbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('searchbar.index');
    }

    public function autocomplete() {
        $term = Input::get('term');
        $results = array();
        $queryRecipe = DB::table('recipes')
            ->where('country', 'LIKE', '%'.$term.'%')->get();
        $queryPost = DB::table('posts')
            ->where('country', 'LIKE', '%'.$term.'%')->get();

        foreach ($queryRecipe as $query) {
            $results[] = ['value' => $query->country ];
        }
        foreach ($queryPost as $query) {
            $results[] = ['value' => $query->country ];
        }
        $results = array_map("unserialize", array_unique(array_map("serialize", $results)));
        return Response::json($results);
    }

    public function result(Request $request) {
        $query = $request->query();
        $posts = Post::where('country', $query)->get();
        $recipes = Recipe::where('country', $query)->get();
        return view('searchbar.result')->with('posts', $posts)->with('recipes', $recipes);
    }

}
