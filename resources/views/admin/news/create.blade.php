@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить новость</h1> &nbsp; <strong><a
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
            <form action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-8">
                    <div class="form-group">
                        <label for="title_news">Заголовок</label>
                        <input type="text" class="form-control" placeholder="title" name="title_news"
                               value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="title_news">Описание</label>
                        <textarea name="description" rows="3" class="form-control"
                                  id="description">{!! old('descrition') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Выбрать категорию</label>
                        <select class="form-control" for="title_news" name="category" id="category">
                            <option>Выбрать</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Изображения новости</label>
                        <input class="form-control" id="image" name="image" type="file">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>

        </div>


    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', options);
    </script>
@endsection
@push('js')
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
