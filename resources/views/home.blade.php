@extends('layouts.app')
@include('layouts._page_header')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h1 class="text-center">Create</h1>
        <a href="{{ $creatorURI }}">
            <img src="img/plan.jpg" class="img-responsive img-circle center-block">
        </a>
        <p class="text-center">
            Build recepies with <a href="{{ $creatorURI }}"><strong>The Creator</strong></a> and learn about ingredients as you go.
        </p>
    </div>
    <div class="col-md-4">
        <h1 class="text-center">Make</h1>
        <a href="{{ $guideURI }}">
            <img src="img/brew.jpg" class="img-responsive img-circle center-block">
        </a>
        <p class="text-center">
            <a href="{{ $guideURI }}"><strong>The Guide</strong></a> makes your brew day smooth and makes logging a breeze.
        </p>
    </div>
    <div class="col-md-4">
        <h1 class="text-center">Drink</h1>
        <a href="{{ $tasterURI }}">
            <img src="img/drink.jpg" class="img-responsive img-circle center-block">
        </a>
        <p class="text-center">
            The most important part! Learn how to use <a href="{{ $tasterURI }}"><strong>The Taster</strong></a> to improve your beer.
        </p>
    </div>
</div><!-- row -->
@stop