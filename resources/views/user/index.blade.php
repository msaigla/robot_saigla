@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="{{asset('uploads/avatars/' . $user->avatar)}}" alt="{{$user->name}}" class="img-circle" style="width: 150px; height: 150px; float: left;">
                <h2>Профиль: {{$user->name}}</h2>
                <form action="#" method="post">
                    {{csrf_field()}}
                    <a class="btn btn-default" href="{{route('user.edit', $user)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                </form>
                <form class="form-horizontal" action="{{route('user.update', $user)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}

                    <div class="form_group">
                        <input type="file" name="avatar">
                        <input class="btn btn-primary" type="submit" value="Сохранить">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
