@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center">Выполнен поиск по запросу: {{$quest}}</h2>
            @forelse($lessons as $lesson)
                <div class="col-sm-4">
                    <img src="{{$lesson->image}}" width="100%">
                    <h2><a href="{{route('article', $lesson->slug)}}">{{$lesson->title}}</a></h2>
                    <p>{!! $lesson->description_short !!}</p>
                </div>
            @empty
                <h2 class="text-center">Совпадений нету</h2>
            @endforelse
        </div>

        {{$lessons->links()}}
    </div>
@endsection