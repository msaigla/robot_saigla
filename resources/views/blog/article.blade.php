@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keyword', $article->meta_keyword)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{$article->title}}</h4></div>
                    @if($article->video != null)
                        <center><iframe width="560" height="315" src="{{$article->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>
                    @endif
                    @if($article->downloadFile != null)
                        <form class="form-horizontal" action="{{route('articles.downloadFile')}}" method="get">
                            <input type="hidden" name="title" value="{{$article->title}}" id="title"/>
                            <input type="hidden" name="file" value="{{$article->downloadFile}}" id="file"/>
                            <button class="btn btn-success btn-lg"><i class="fa fa-download" aria-hidden="true"></i> Скачать</button>
                        </form>
                    @endif
                    <div class="panel-body">
                        {!! $article->description !!}
                        <div class="post-meta">
                            <span class="post-meta">Категории:
                                @foreach($categories as $category)
                                    {{$category->title}}
                                @endforeach
                            </span><br>
                            <span class="post-meta-author">Автор: {{$user->name}}</span>
                            <span class="post-meta-date">Дата публикации: {{$article->updated_at->format('d.m.Y G:i')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection