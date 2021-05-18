@extends('layouts.main')

@section('content')

    <h1 class="mt-4 mb-3"></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">News</a>
        </li>
        <li class="breadcrumb-item active"></li>
    </ol>

    @forelse($listNews as $news)
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$news->title_news}}</h3>
                <p>{{$news->description}}</p>
                <a class="btn btn-primary" href='{{route('news.show', ['id'=>$news->id,'cat'=>$news->category])}}'>More
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <hr>
    @empty
        <h3>Нет новостей в этой категории</h3>
    @endforelse

@stop



