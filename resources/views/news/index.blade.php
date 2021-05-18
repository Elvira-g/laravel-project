@extends('layouts.main')

@section('content')
<h1 class="my-4">Категории новостей</h1>

<div class="container">
    <div class="category-block">
        @forelse($listNews as $news)
            <div class="category">
                <h3>{{$news->title_category}}</h3>
                <p>{{$news->description}}</p>
                <a href='{{route('news.category',['news'=>$news->id])}}' class="btn btn-primary">К списку новостей</a>
            </div>
        @empty
            <h3>Нет Новостей</h3>
        @endforelse
        </div>
</div>

@stop
