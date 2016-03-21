@extends('layouts.app')
@include('layouts._page_header')

@section('content')
<form accept-charset="UTF-8" class="creator-form">
    @include('creator._tabs')
    <div class="tab-content">
            @include('creator._info')
            @include('creator._targets')
            @include('creator._fermentables')
            @include('creator._hops')
            @include('creator._yeasts')
            @include('creator._fermentation')
    </div><!-- tab-content -->
</form>
@endsection