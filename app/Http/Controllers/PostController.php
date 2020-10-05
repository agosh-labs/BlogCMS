<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        



        //We create a view and load here
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Get all categories 
        $categories = Category::all();

        //Count categories and redirect if 0 with message 
        if($categories->count() == 0){

            //Add new message type as info
            Session::flash('info', 'Please add a category before continiue.');

            return redirect()->back();
        } 

        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        //Another method of 
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        //Change image
        //We need to change the image name because user might upload image with same name twice
        $featured = $request->featured;
        $originalName = $featured->getClientOriginalName();
        $featured_new_name = 'image-' . time() . '-' . $originalName;
        //We will store this name 
        //echo $featured_new_name;

        //And lets save the image to a directory inside public
        //We can use move method 
        $featured->move('uploads/posts', $featured_new_name);

        //Create Post
        //Lets use create() method 
        //Add path as well it makes it easier during view
        //We will use an available function to convert title to slug 
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name, 
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        //Flash message
        Session::flash('success', 'Post has been created.');



        //Redirect to index of posts 
        //We can use route for this
        return redirect()->route('posts.index')->withInput();
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
        //Send to new page with edit form
        $post = Post::find($id);
        //need categories as well
        $categories = Category::all();

        return view('posts.edit')->with('post', $post)
                                 ->with('categories', $categories);
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
        //Make featured not required as user may not need to update it
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'image',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')) {
            $featured = $request->featured;
            $originalName = $featured->getClientOriginalName();
            $featured_new_name = 'image-' . time() . '-' . $originalName;

            //Move
            $featured->move('uploads/posts', $featured_new_name);

            //Now need to update to new name
            $post->featured = 'uploads/posts' .  $featured_new_name;
        }

        //Update remaining fields
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        Session:: flash('success', 'Post has been succesfully updated.');


        return redirect()->route('posts.index');
         

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
