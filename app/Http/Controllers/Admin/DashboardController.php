<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('admin.dashboard', [
            'categories'=>Category::LastCategories(5),
            'articles'=>Article::LastArticles(5),
            'count_categories'=>Category::count(),
            'count_articles'=>Article::count(),
            'count_users'=>User::count(),
        ]);
    }

}
