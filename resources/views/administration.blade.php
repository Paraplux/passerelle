@extends('private-layout')

@section('style')
<link rel="stylesheet" href="/css/administration.css">
@endsection

@section('content')

@yield('index')

@yield('create')


@yield('edit')

@endsection