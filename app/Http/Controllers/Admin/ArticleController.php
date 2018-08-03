<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
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
        $article = Article::create($request->all());
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        if ($request->hasFile('image')) {
            $file = $request->file('image');;
            $file->move(public_path() . '/uploads/articles_image/' , $article->id);
            $url = URL::to("/") . '/uploads/articles_image/' . $article->id;
            DB::table('articles')
                ->where('id', $article->id)
                ->update([
                    'image' => $url,
                ]);
        }
        if ($request->hasFile('downloadFile')) {
            $file = $request->file('downloadFile');;
            $file->move(public_path() . '/uploads/articles_files/' , $file->getClientOriginalExtension());
            $url = URL::to("/") . '/uploads/articles_files/' . $file->getClientOriginalExtension();
            DB::table('articles')
                ->where('id', $article->id)
                ->update([
                    'downloadFile' => $url,
                ]);
        }

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
        $article->update($request->except('slug'));

        $article->categories()->detach();
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        if ($request->hasFile('image')) {
            $file = $request->file('image');;
            $file->move(public_path() . '/uploads/articles_image/' , $article->id);
            $url = URL::to("/") . '/uploads/articles_image/' . $article->id;
            DB::table('articles')
                ->where('slug', $request->except('slug'))
                ->update([
                    'image' => $url,
                ]);
        }
        if ($request->hasFile('downloadFile')) {
            $file = $request->file('downloadFile');;
            $file->move(public_path() . '/uploads/articles_files/' , $file->getClientOriginalExtension());
            $url = URL::to("/") . '/uploads/articles_files/' . $file->getClientOriginalExtension();
            DB::table('articles')
                ->where('id', $article->id)
                ->update([
                    'downloadFile' => $url,
                ]);
        }

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
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
