<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Tag;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']); //second parameter can be passed with array
        // $this->middleware('demo', ['only' => 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // return Auth::user();
        // return view('welcome');
        $articles = Articles::latest('published_at')->published()->get();
        $latest = Articles::latest()->first();
        
        return view('articles.index', compact('articles', 'latest'));
    }

    public function uploads()
    {
        return view('upload');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // if(Auth::guest())
        // {
        //     return redirect('articles');
        // }
        $tags = Tag::lists('name','id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        // $this->validate($request, ['title'=>'required|min:5', 'content'=>'required']);
        // $articles = new Articles($request->all());

        $this->createArticle($request);
        // Auth::user()->articles()->save($articles);
        // Articles::create($request->all());
        return redirect('articles');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Articles $article)
    {
        
        $latest = $article->latest()->first();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Articles $article)
    {
        
        $tags = Tag::lists('name','id');

        return view('articles.edit', compact('article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Articles $article, ArticleRequest $request)
    {
        
        $article->update($request->all());

        $this->syncTags($article, $request->input('tagList'));

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }

    private function syncTags(Articles $article, array $tags)
    {
     
        $article->tags()->sync($tags);
    }

    /**
     * Create article
     * @param  ArticleRequest $request [description]
     * @return [type]                  [description]
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tagList'));

        return $article;
    }
}
