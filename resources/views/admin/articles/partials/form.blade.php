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
<label for="description_short">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short" required >{{$article->description_short or ""}}</textarea>

<label for="description">Полное описание</label>
<textarea class="form-control" id="description" name="description" required >{{$article->description or ""}}</textarea>

<label for="">Фото статьи:</label>
<input id="image" type="file" class="form-control" name="image">

<label for="">Файл:</label>
<input id="downloadFile" type="file" class="form-control" name="downloadFile">

<label for="video">Src видео:</label>
<textarea class="form-control" id="video" name="video">{{$article->video or ""}}</textarea>

<label for="">Источник:</label>
<input type="text" class="form-control" name="source" value="{{$article->source or ""}}">

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета материала" value="{{$article->meta_title or ""}}" required>

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описания" value="{{$article->meta_description or ""}}" required>

<label for="">Мета слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Мета слова(через запятую)" value="{{$article->meta_keyword or ""}}" required>

<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">
