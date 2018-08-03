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
                    @if($article->videoBool)
                        <center><iframe width="560" height="315" src="{{$article->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>
                    @endif
                    <div class="panel-body">
                        <p>{!! $article->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection