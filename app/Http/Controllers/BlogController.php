<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;

class BlogController extends Controller
{
    public function category($slug){
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category'=>$category,
            'articles'=>$category->articles()->where('published', 1)->paginate(12,  ['*'], 'Blog'),
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
}
