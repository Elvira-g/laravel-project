@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Изменить новость</h1> &nbsp; <strong><a
                    href="{{ route('admin.categories.index') }}">Список категорий</a></strong>
        </div>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{route('admin.news.update',['news'=>$news])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-8">
                    <div class="form-group">
                        <label for="title_news">Заголовок</label>
                        <input type="text" class="form-control" placeholder="title" name="title_news"
                               value="{{ $news->title_news }}">
                    </div>
                    <div class="form-group">
                        <label for="title_news">Описание</label>
                        <textarea name="description" rows="3" class="form-control">{!! $news->description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title_news">Категория</label>
                        <textarea name="category" rows="1" class="form-control">{!! $news->category !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>

        </div>


    </div>
@endsection
