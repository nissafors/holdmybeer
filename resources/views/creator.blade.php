@extends('layouts.app')
@include('layouts._page_header')

@section('content')
<form>
    @include('creator._tabs')
    <div class="tab-content">
        @include('creator._info')
        @include('creator._target')
        @include('creator._extract')
        @include('creator._hops')
        @include('creator._yeast')
        @include('creator._fermentation')
        @include('creator._settings')
    </div><!-- tab-content -->
</form>
@endsection