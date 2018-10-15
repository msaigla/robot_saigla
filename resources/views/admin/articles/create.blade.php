@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание статьи @endslot
            @slot('parent') Главная @endslot
            @slot('active') Статьи @endslot
        @endcomponent

        <hr/>

        <form class="form-horizontal" action="{{route('admin.article.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            @include('admin.articles.partials.form')

            <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::id()}}">

        </form>
    </div>
@endsection
@section('individualJS')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'description', options );
        CKEDITOR.replace( 'description_short', options );
    </script>
@endsection
