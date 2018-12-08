@extends('layouts.app')

@section('title', $category->title . " - SAIGLA")

@section('content')
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-3">
                    <div class="article">
                        <img src="{{$article->image}}" width="100%">
                        <h2 class="post__title"><a class="post__title_link" href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                        <p>{!! $article->description_short !!}</p>
                        <div class="footer">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{$article->updated_at->format('d.m.Y в G:i')}}
                        </div>
                    </div>
                </div>
            @empty
                <h2 class="text-center">Пусто</h2>
            @endforelse
        </div>

        {{$articles->links()}}
    </div>

@endsection