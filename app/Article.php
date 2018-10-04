<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Article extends Model
{

    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'downloadFile', 'video', 'source', 'meta_title',
        'meta_description', 'meta_keyword', 'viewed', 'published', 'created_by', 'modified_id'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-' .
            \Carbon\Carbon::now()->format('dmyHi') . '-');
    }

    public function categories(){
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function scopeLastArticles($query, $count){
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function allCategories(Article $article){
        $categories = $article->categories()->value('title');
        return $categories;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class );
    }
}
