<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug){
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category'=>$category,
            'articles'=>$category->articles()->where('published', 1)->paginate(12,  ['*'], $slug),
        ]);
    }

    public function article($slug){
        $article = Article::where('slug', $slug)->first();
        $user = User::where('id', $article['created_by'])->first();
        return view('blog.article', [
            'article'=>$article,
            'user'=>$user,
            'categories'=>$article->categories()->where('published', 1)->get(),
        ]);
    }

    public function downloadFile(Request $request)
    {
        return response()->download($request->input('file'), $request->input('title'));
    }
}
