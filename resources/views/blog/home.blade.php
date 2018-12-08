@extends('layouts.app')

@section('title', "Saigla - уроки по радиоэлектронике, arduino, микроконтроллерам, LEGO Mindstorms и т.д")
@section('meta_description', "уроки по радиоэлектронике, arduino, микроконтроллерам, LEGO Mindstorms и т.д")
@section('meta_keyword', "saigla, радиоэлектроника, микроконтроллеры, уроки, LEGO, Mindstorms, arduino, Raspberry, PI")

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="testCarousel" class="carousel slide" data-ride="carousel">
        <!-- Слайды карусели -->
        <div class="carousel-inner">
            <!-- Слайд 1 -->
            <div class="item active">
                <h2>Новые уроки.</h2>
                <p>Специально для вас мы добавляем каждую неделю новый урок по робототехнике!</p>
                <a href="{{url("/blog/category/uroki-0209182206")}}"><button class="btn btn-primary btn-lg">Уроки</button></a>
            </div>
            <!-- Слайд 2 -->
            <div class="item">
                <h2>Предложить урок.</h2>
                <p>Вы можете предложить свой урок по робототехнике написав письмо на почту support@saigla.ru c прикрепленным уроком в pdf или doc формате.</p>
                <a href="{{ url('/home') }}"><button class="btn btn-success btn-lg">Личный кабинет</button></a>
            </div>
        </div>

        <!-- Навигация карусели (следующий или предыдущий слайд) -->
        <!-- Кнопка, переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
        <a class="left carousel-control" href="#testCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <!-- Кнопка, переход на следующий слайд с помощью атрибута data-slide="next" -->
        <a class="right carousel-control" href="#testCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
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
    </div>

@endsection
