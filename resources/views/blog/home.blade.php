@extends('layouts.app')

@section('content')

    <div id="testCarousel" class="carousel slide" data-ride="carousel">
        <!-- Слайды карусели -->
        <div class="carousel-inner">
            <!-- Слайд 1 -->
            <div class="item active">
                <h2>Новые уроки.</h2>
                <p>Специально для вас мы добовляем каждую неделю новый урок по робототехнике!</p>
                <a href="{{url("/blog/category/uroki-0209182206")}}"><button class="btn btn-primary btn-lg">Уроки</button></a>
            </div>
            <!-- Слайд 2 -->
            <div class="item">
                <h2>Предложить урок.</h2>
                <p>Вы можете предложить свой урок по робототехнике с помощью обратной связи в личном кабинете или написав сообщение на почту lesson@saigla.ru</p>
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

@endsection
