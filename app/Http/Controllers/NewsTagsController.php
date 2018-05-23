<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\NewsTag;

class NewsTagsController extends Controller
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
        $tags = NewsTag::all();
        return view('news-tags.index')->with([
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new NewsTag;
        $tag->name = $request->tag;
        $tag->save();

        Session::flash('success', 'You Created New Tag: ' . $tag->name);

        return redirect()->route('news-tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = NewsTag::find($id);
        return view('news-tags.show')->with([
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = NewsTag::find($id);
        return view('news-tags.edit')->with([
            'tag' => $tag,
        ]);
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
        $tag = NewsTag::find($id);
        Session::flash('success', 'You Edited News Tag: ' . $tag->name);
        $tag->name = $request->tag;
        $tag->save();

        return redirect()->route('news-tags.index');
    }

    public function delete($id) {
        $tag = NewsTag::find($id);
        return view('news-tags.delete')->with([
            'tag' => $tag,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = NewsTag::find($id);
        Session::flash('delete', 'You Deleted Tag: ' . $tag->name);
        $tag->save();

        return redirect()->route('news-tags.index');
    }
}
