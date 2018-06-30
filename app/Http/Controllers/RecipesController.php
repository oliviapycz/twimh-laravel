<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\IngredientsController;
use App\Recipe;
use App\Ingredient;

class RecipesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(9);
        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country' => 'required',
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'ingredient.*.name' => 'required',
        ]);

         // Handle File Upload
         if($request->hasFile('cover_image')){
            // Get a file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Create filename to store (unique filename)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
//            ->storeAs('public/cover_images' will store the images in : /storage/app/public
//            $ php artisan storage:link  will create that private folder in the /public folder and link
        } else {
            $fileNameToStore = 'noplate.jpg';
        }
        // Create Recipe
        $recipe = new Recipe;
        $recipe->country = strtoupper($request->input('country'));
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->body = $request->input('body');
        $recipe->cover_image = $fileNameToStore;
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        //Add ingredients
        app('App\Http\Controllers\IngredientsController')->addIng($recipe);
        
        return redirect('/dashboard')->with('success', 'Recipe created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        //Check for correct user
        if(auth()->user()->id !== $recipe->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized page');
        }

        return view('recipes.edit')->with('recipe', $recipe);
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
        $this->validate($request, [
            'country' => 'required',
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
          // nullable: so that image is NOT required, max at 1999 to fit in 2MG
        ]);
        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get a file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Create filename to store (unique filename)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
//            ->storeAs('public/cover_images' will store the images in : /storage/app/public
//            $ php artisan storage:link  will create that private folder in the /public folder and link
        } 

        // Update Recipe
        $recipe = Recipe::find($id);
        $recipe->country = strtoupper($request->input('country'));
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->body = $request->input('body');
        $recipe->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')) {
            $recipe->cover_image = $fileNameToStore;
        }
        $recipe->save();
        
        return redirect('/dashboard')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        //Check for correct user
        if(auth()->user()->id !== $recipe->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized page');
        }

        if($recipe->cover_image !== 'noimage.jpg'){
            // Delete image in Storage
            Storage::delete('public/cover_images/'.$recipe->cover_images);


        }

        $recipe->delete();
        return redirect('/dashboard')->with('success', 'Post removed');
    }
}
