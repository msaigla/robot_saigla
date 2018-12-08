@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keyword', $article->meta_keyword)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{$article->title}}</h2></div>
                    @if($article->video != null)
                        <center>{!! $article->video !!}</center>
                    @endif
                    @if($article->downloadFile != null)
                        <form class="form-horizontal" action="{{route('articles.downloadFile')}}" method="get">
                            <input type="hidden" name="title" value="{{$article->title}}" id="title"/>
                            <input type="hidden" name="file" value="{{$article->downloadFile}}" id="file"/>
                            <button class="btn btn--small btn-cta btn--addon__download" style="color: white; background-color: #af0b0b; margin: 15px;"><i class="fa fa-download" aria-hidden="true"></i> Скачать</button>
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
                            <span class="post-meta-author"> Автор: <a href="{{route('otherProfile', $user->id)}}">{{$user->name}}</a> </span>
                            @if($article->source != null)
                              <span class="post-meta-date"><a href="{{$article->source}}"> Источник</a></span>
                            @endif
                            <span class="post-meta-date">Дата публикации: {{$article->updated_at->format('d.m.Y в G:i')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Коментарии:</h3>
                @include('blog.partials._comment_replies', ['comments' => $article->comments, 'article_id' => $article->id])
                <hr />
                <hr />
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Добавить комментарий:</h4>
                        @guest
                            <h5>Вы должны войти в систему, чтобы оставить комментарий.</h5>
                        @else
                            <form method="POST" action="{{ route('comment.add') }}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea rows="3" class="form-control" maxlength="255" id="comment_body" name="comment_body"></textarea>
                                    <input type="hidden" name="article_id" value="{{ $article->id }}" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg" value="Add Comment">Коментировать <i class="fa fa-comment-o" aria-hidden="true"></i></button>
                                </div>
                        </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
