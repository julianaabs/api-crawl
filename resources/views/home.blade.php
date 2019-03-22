@extends('adminlte::page')

@section('title', 'Movie Crawler')

@section('content_header')
    <h1>Studio Ghibli API</h1>
@stop

@section('content')
    <p>The Studio Ghibli API catalogs the people, places, and things found in the worlds of Ghibli. It was created to help users discover resources, consume them via HTTP requests, and interact with them in whatever way makes sense. Navigation can be found on the left sidebar, and the right sidebar shows examples of returned objects for successful calls.</p>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop