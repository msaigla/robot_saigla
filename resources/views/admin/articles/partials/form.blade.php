<label for="">Статус</label>
<select class="form-control" name="published">
    @if(isset($article->id))
        <option value="0" @if($article->published==0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if($article->published==1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif

</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок материала" value="{{$article->title or ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input type="text" class="form-control" name="slug" placeholder="Авоматическая генерация" value="{{$article->slug or ""}}" readonly>

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    <option value="0"> -----Без родителя-----</option>
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>
<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>

<label for="">Фото статьи:</label>
<input id="image" type="file" class="form-control" name="image">

<label class="checkbox-inline">
    <input id="downloadFileBool" type="hidden" name="downloadFileBool" value="0">
    <input id="downloadFileBool" type="checkbox" value="1" name="downloadFileBool" checked>  <p>Добавить файл к статье?</p>
</label>
<label for="">Файл:</label>
<input id="downloadFile" type="file" class="form-control" name="downloadFile">

<label class="checkbox-inline">
    <input id="videoBool" type="hidden" name="videoBool" value="0">
    <input id="videoBool" type="checkbox" value="1" name="videoBool" checked> <p>Добавить видео к статье?</p>
</label>

<label for="">Src видео:</label>
<input type="text" class="form-control" name="video" value="{{$article->video or ""}}">


<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета материала" value="{{$article->meta_title or ""}}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описания" value="{{$article->meta_description or ""}}">

<label for="">Мета слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Мета слова(через запятую)" value="{{$article->meta_keyword or ""}}">

<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">