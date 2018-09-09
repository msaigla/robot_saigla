<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index',[
            'articles'=>Article::orderBy('created_at', 'desc')->paginate('10')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
            'article'=>[],
            'categories'=>Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'=>''
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
        $article = Article::create($request->except('image', 'downloadFile'));
        if ($request->hasFile('image')) {
            $file = $request->File('image');
            $token = sha1(time());
            $file->move(public_path() . '/uploads/articles_image/' , $token);
            $url = '/uploads/articles_image/' . $token;
            $article->update(['image' => $url]);
//            $article->save();
            //return redirect('/home')->with('status', $article->getAttribute('image'));
        }
        if ($request->hasFile('downloadFile')) {
            $file = $request->File('downloadFile');;
            $file->move(public_path() . '/uploads/articles_files/' , $file->getClientOriginalExtension());
            $url = '/uploads/articles_files/' . $file->getClientOriginalExtension();
            $article->update(['downloadFile' => $url]);
        }
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;
        return redirect()->route('admin.article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article'=>$article,
            'categories'=>Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'=>''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->hasFile('image')) {
            app(Filesystem::class)->delete(public_path($article->getAttribute('image')));
            $file = $request->File('image');
            $token = sha1(time());
            $file->move(public_path() . '/uploads/articles_image/' , $token);
            $url = '/uploads/articles_image/' . $token;
            $article->update(['image' => $url]);
            //return redirect('/home')->with('status', $article->getAttribute('image'));
        }
        if ($request->hasFile('downloadFile')) {
            app(Filesystem::class)->delete(public_path($article->getAttribute('downloadFile')));
            $file = $request->File('downloadFile');
            $token = sha1(time());
            $file->move(public_path() . '/uploads/articles_files/' , $token . $file->getClientOriginalName());
            $url = '/uploads/articles_files/' . $token . $file->getClientOriginalName();
            $article->update(['downloadFile' => $url]);
        }
        $article->update($request->except('slug', 'image', 'downloadFile'));
        $article->categories()->detach();
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        if($article->getAttribute('image')!=null)app(Filesystem::class)->delete(public_path($article->getAttribute('image')));
        if($article->getAttribute('downloadFile')!=null)app(Filesystem::class)->delete(public_path($article->getAttribute('downloadFile')));
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
