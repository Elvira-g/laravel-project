@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список категорий</h1> &nbsp; <strong>
                <a href="{{ route('admin.categories.create') }}">Добавить категорию</a></strong>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        <div class="row">
            <table class="table table-bordered">
                <header>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Слаг</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </tr>
                </header>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->title_category}}</th>
                        <th>{{$category->slug}}</th>
                        <th>{{$category->created_at}}</th>
                        <th>
                            <button><a href="{{route('admin.categories.edit',['category'=>$category])}}">edit</a>
                            </button>
                            <form action="{{route('admin.categories.destroy',['category'=>$category])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="delete-btn">delete</button>
                            </form>&nbsp;
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>


    </div>
@endsection
