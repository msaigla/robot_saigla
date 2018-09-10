<?php

namespace App\Http\Controllers\Soft;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'search' => 'required',
        ]);
       $q = $request->input('search');
        $max_page = 12;
        //Полнотекстовый поиск с пагинацией
        $results = DB::table('articles')
            ->where(function($quest) use ($q) {
                $quest->where('title', 'like', '%' . $q . '%')
                    ->orWhere('description_short', 'like', '%' . $q . '%')
                    ->orWhere('description', 'like', '%' . $q . '%');
            })
            ->where('published', '1')
            ->get();
        return view('soft.search.index',[
            'lessons'=>$results,
            'quest'=>$q,
        ]);
    }

    public function search(Request $request){
        dd($request->all());
    }
}
