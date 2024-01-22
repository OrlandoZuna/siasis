@extends('valhalla::layouts.master')
@section('menu')
    @include('valhalla::complement.menu')
@endsection

@section('bar_top')
    @include('valhalla::complement.navs')
@endsection
@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('valhalla.name') !!}
    </p>
@endsection
