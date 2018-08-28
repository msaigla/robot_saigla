@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редатировать профиль</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('addProfile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ваше имя:</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="aboutOneself" class="col-md-4 control-label">О себе: </label>
                            <div class="col-md-6">
                                <textarea rows="3" class="form-control" maxlength="255" id="aboutOneself" name="aboutOneself" placeholder="Расскажите немного о себе">{{ Auth::user()->aboutOneself }}</textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="inputDate" class="col-md-4 control-label">Введите дату рождения*</label>

                            <div class="col-md-6">
                                <input placeholder="Введите дату рождения" id="birthday" type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}" required>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Аватар:</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" accept="image/jpeg,image/png">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <label class="checkbox-inline">
                                    <input id="receiveLetter" type="hidden" name="receiveLetter" value="0">
                                    <input id="receiveLetter" type="checkbox" value="1" name="receiveLetter" @if(Auth::user()->receiveLetter == '1') checked @endif>  Я хочу получать письма о новых статьях и нововведений сайта.
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection