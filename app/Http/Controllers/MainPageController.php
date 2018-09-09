<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function mainPage(){
        return view('blog.home', [
            'articles'=>Article::LastArticles(6)->where('published', 1),
        ]);
    }
}
