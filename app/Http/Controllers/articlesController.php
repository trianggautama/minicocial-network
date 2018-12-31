<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use Auth;
use DB;

class articlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  $articles = article::with('User')->get();
       $articles=article::paginate(10);
      //$article=DB::table('articles')->wherelive(1)->first();
    //  dd($article);
      return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/*
  $article=new article;
  $article->user_id =Auth::user()->id;
  $article->content=$request->content;
  $article->live=(boolean)$request->live;
  $article->post_on=$request->post_on;
  $article->save();
*/
//DB::table('articles')->insert($request->except('_token'));
article::create($request->all());
return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article=article::findOrFail($id);
      return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article=article::findOrFail($id);
      return view('articles.edit',compact('article'));
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
      $article=article::findOrFail( $id);
if (!isset($request->live))
  $article->Update(array_merge($request->all(),['live'=>false]));
      else
      $article->Update($request->all());
      return redirect('/articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=article::findOrFail($id);
        $article->delete();
        return redirect('/articles');
    }
}
