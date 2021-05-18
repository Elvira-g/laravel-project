@extends('layouts.admin')
@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список новостей</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.create') }}">Добавить новость</a></strong>
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
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </tr>
                </header>
                <tbody>
                @forelse($allNews as $news)
                    <tr>
                        <th>{{$news->id}}</th>
                        <th>{{$news->title_news}}</th>
                        <th>{{$news->description}}</th>
                        <th>{{$news->category}}</th>
                        <th>{{$news->created_at}}</th>
                        <th>
                            <button><a href="{{route('admin.news.edit',['news'=>$news])}}">edit</a></button>
                            <form action="{{route('admin.news.destroy',['news'=>$news])}}" method="POST">
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
