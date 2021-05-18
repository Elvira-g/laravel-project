@extends('layouts.main')

@section('content')
@forelse($news as $item)
<h1 class="mt-4 mb-3">{{ $item->title_news }}
</h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">News</a>
    </li>
    <li class="breadcrumb-item active"></li>
</ol>

<div class="row">

    <div class="col-md-8">
        <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-4">
        <p>{{ $item->description }}</p>
    </div>

</div>
@empty
    <h1>Новость дополняется</h1>
@endforelse

<h3 class="my-4">Related news</h3>

<div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

</div>
@stop
