<div class="container">
    <div class="row">
        @forelse($lesson as $lessons)
            <div class="col-sm-4">
                <img src="{{$lesson->image}}" width="280" height="157">
                <h2><a href="{{route('article', $lesson->slug)}}">{{$lesson->title}}</a></h2>
                <p>{!! $lesson->description_short !!}</p>
            </div>
        @empty
            <h2 class="text-center">Пусто</h2>
        @endforelse
    </div>

    {{$lessons->appends(['q' => \Illuminate\Support\Facades\Input::get('q')])->links()}}
</div>