@extends('layouts.app')

@section('title', $category->title . " - SAIGLA")

@section('content')
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-4">
                    <img src="{{$article->image}}" width="100%">
                    <h2><a class="post__title_link" href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                    <p>{!! $article->description_short !!}</p>
                </div>
            @empty
                <h2 class="text-center">Пусто</h2>
            @endforelse
        </div>

        {{$articles->links()}}
    </div>

@endsection
