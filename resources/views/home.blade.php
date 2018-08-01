@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <img src="{{ Auth::user()->avatar }}" class="img-circle" style="width: 150px; height: 150px; float: left; margin-right: 25px;">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->aboutOneself }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
