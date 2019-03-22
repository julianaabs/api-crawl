@extends('adminlte::page')

@section('title', 'Movie Crawler')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to the Movie Crawler.</p>

    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th colspan="7">List of Movies</th>
                            </tr>
                            <tr>
                                <th class="col-md-3">Movie</th>
                                <th class="col-md-3">Description</th>
                                <th class="col-md-3">Director</th>
                                <th class="col-md-3">Producer</th>
                                <th class="col-md-3">Year</th>
                                <th class="col-md-3">Rotten Tomato Score</th>
                                <th class="col-md-3">Characters</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($movie_data))
                            @foreach($movie_data as $m)
                            <tr>
                                <th>{{$m->title}}</th>
                                <th>{{$m->description}}</th>
                                <th>{{$m->director}}</th>
                                <th>{{$m->producer}}</th>
                                <th>{{$m->release_date}}</th>
                                <th>{{$m->rt_score}}</th>
                                <th>{{$m->people}}</th>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop