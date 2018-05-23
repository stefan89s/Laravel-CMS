<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;
use App\NewsTag;
use App\News;
use Auth;
use Session;

class NewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin', ['except' => ['news', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(5);
        $categories = NewsCategory::all();
        return view('news.index')->with([
            'news' => $news,
            'categories' => $categories,
        ]);
    }

    //News For Public
    public function news() {
        $news = News::orderBy('id', 'DESC')->paginate(8);
        $categories = NewsCategory::all();
        return view('news.public')->with([
            'news' => $news,
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
        $categories = NewsCategory::all();
        $tags = NewsTag::all();
        return view('news.create')->with([
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;

        $news->title = $request->title;
        $news->article = $request->article;
        $news->admin_id = Auth::guard('admin')->id();
        $news->news_category_id = $request->category;
        $news->slug = $request->slug;
        $news->save();

        $news->newsTags()->sync($request->tags, false);

        Session::flash('success', 'You Created New Post: ' . $news->title);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', '=', $slug)->first();
        return view('news.show')->with([
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = NewsCategory::all();
        $news = News::where('slug', '=', $slug)->first();
        return view('news.edit')->with([
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $news = News::where('slug', '=', $slug)->first();

        $news->title = $request->title;
        $news->article = $request->article;
        $news->admin_id = Auth::guard('admin')->id();
        $news->news_category_id = $request->category;
        $news->slug = $request->slug;
        $news->save();

        Session::flash('success', 'You Edited Post: ' . $news->title);

        return redirect()->route('news.index');
    }

    //Delete Pge
    public function delete($slug) {
        $article = News::where('slug', '=', $slug)->first();
        return view('news.delete')->with([
            'article' => $article,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = News::where('slug', '=', $slug)->first();
        Session::flash('delete', 'You Deleted the article: ' . $article->title);
        $article->delete();

        return redirect()->route('news.index');
    }
}
