@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>
                        <img src="{{ $user->avatar }}" class="img-circle" style="width: 150px; height: 150px; float: left; margin-right: 25px;">
                        <h2>{{ $user->name }}</h2>
                        <p>{!! $user->aboutOneself !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
