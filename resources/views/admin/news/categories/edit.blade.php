@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Изменить категорию</h1> &nbsp; <strong><a
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
            <form action="{{route('admin.categories.update',['category'=>$category])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-8">
                    <div class="form-group">
                        <label for="title_category">Наименование категории</label>
                        <input type="text" class="form-control" placeholder="title" name="title_category"
                               value="{{ $category->title_category }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Описание категории</label>
                        <textarea name="description" rows="5"
                                  class="form-control">{!! $category->description !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>

        </div>


    </div>
@endsection
