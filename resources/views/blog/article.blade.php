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
                        <div class="panel-body">
                            <p>{!! $article->description !!}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection