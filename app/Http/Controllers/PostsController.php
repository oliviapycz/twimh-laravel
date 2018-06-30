<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
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
        //$posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'cover_image' => 'image|nullable|max:1999'
          // nullable: so that image is NOT required, max at 1999 to fit in 2MG
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get a file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Eextention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Create filename to store (unique filename)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
//            ->storeAs('public/cover_images' will store the images in : /storage/app/public
//            $ php artisan storage:link  will create that private folder in the /public folder and link
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Post
        $post = new Post;
        $post->country = strtoupper($request->input('country'));
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/dashboard')->with('success', 'Post created');
        // success relates to our message file
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::find($id);
       return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized page');
        }

        return view('posts.edit')->with('post', $post);
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

        // Update Post
        $post = Post::find($id);
        $post->country = strtoupper($request->input('country'));
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        
        $post->save();
        return redirect('/dashboard')->with('success', 'Post updated');
        // success relates to our message file
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized page');
        }

        if($post->cover_image !== 'noimage.jpg'){
            // Delete image in Storage
            Storage::delete('public/cover_images/'.$post->cover_images);


        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post removed');
    }
}
