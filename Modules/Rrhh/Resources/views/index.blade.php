@extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('rrhh.name') !!}
    </p>
@endsection
