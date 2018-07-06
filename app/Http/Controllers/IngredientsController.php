<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ingredient;
use Illuminate\Support\Facades\Response;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class IngredientsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'autocomplete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function autocomplete() {
        $term = Input::get('term');
         //$term = $request->input('term');
        //$term = "fr";
        \Debugbar::info($term);
        $results = [];
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:3000/foods/search/result_ing='.$term);
        $response = $request->getBody();
        $response = json_decode($response);
        foreach ($response as $query) {
            $results[] =  ['value' => $query->food ];
        }
        // $results = array_map("unserialize", array_unique(array_map("serialize", $results)));
        return Response::json($results);
    }
   // http://localhost:8000/search/result?search_text=FRANCE
    public function addIng($recipe) {
        $ingredients = [];
        $ing = Input::get('ingredients');
        if(isset($ing)) {
            foreach( $ing as $food) {
                $ingredients[] = new Ingredient($food);
            };
        }
        $recipe->ingredients()->saveMany($ingredients);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
