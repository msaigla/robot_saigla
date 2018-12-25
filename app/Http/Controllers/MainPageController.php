<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function mainPage(){
        return view('blog.home', [
            'articles'=>Article::where('published', 1)->LastArticles(8),
        ]);
    }
}
