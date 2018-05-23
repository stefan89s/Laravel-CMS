<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;
use Session;

class NewsCategories extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = NewsCategory::all();
        return view('news-category.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new NewsCategory;
        $category->name = $request->category;
        $category->save();

        Session::flash('success', 'New Category Is Created!');

        return redirect()->route('news-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = NewsCategory::find($id);
        return view('news-category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = NewsCategory::find($id);

        return view('news-category.edit')->with('category', $category);
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
        $category = NewsCategory::find($id);

        Session::flash('success', 'You Edited The Category: ' . $category->name);

        $category->name = $request->category;
        $category->save();

        return redirect()->route('news-category.index');
    }

    //Delete Page
    public function delete($id) {
        $category = NewsCategory::find($id);
        return view('news-category.delete')->with('category', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = NewsCategory::find($id);
        $category->delete();

        Session::flash('delete', 'Category Was Deleted');

        return redirect()->route('news-category.index');
    }
}

