<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //To get all categories using eloquoent 


        $categories = Category::all();

        //Now send this variable to view

        return view('categories.index')->with('categories', $categories);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //1. Validation
        //This will automatically redirect back if fails
        //There are auto fixed error which can be displayed
        $request->validate([
            'name' => 'required|min:4'
        ]);

        //2. Create and save
        //We will use Category Model Class
        //This saves the category 
        $cat = new Category;

        $cat->name = $request->name;

        $cat->save();

        //Flash Message
        //Lets add a flash message using session

        Session::flash('success', 'Succesfully add a category');




        //3. Redirect
        //We can use back() function to redirect to same page
        //Redirect with inputs
        return redirect()->back()->withInput();

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
        // Need to have id sent here
        //Find category of this id

        $category = Category::find($id);
   
        //Send to edit category
        return view('categories.edit')->with('category', $category);
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
        $request->validate([
            'name' => 'required|min:4'
        ]);

        //Finds this category
        $category = Category::find($id);

        //Use this to update

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Category updated succesfully');

        return redirect()->route('categories.index');

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
