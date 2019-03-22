@extends('adminlte::page')

@section('title', 'Movie Crawler')

@section('content_header')
    <h1>Movies</h1>
@stop

@section('content')
    <p>List of all films.</p>

    <div class="content">
            <div class="row">
                <div class="col-md-15">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th colspan="16">List of Movies</th>
                            </tr>
                            <tr>
                                <th class="col-md-2">Movie</th>
                                <th class="col-md-5">Description</th>
                                <th class="col-md-2">Director</th>
                                <th class="col-md-2">Producer</th>
                                <th class="col-md-1">Year</th>
                                <th class="col-md-1">Rotten Tomato Score</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($movies))
                            @foreach($movies as $m)
                            <tr>
                                <th>{{$m->title}}</th>
                                <th>{{$m->description}}</th>
                                <th>{{$m->director}}</th>
                                <th>{{$m->producer}}</th>
                                <th>{{$m->year}}</th>
                                <th>{{$m->rt_score}}</th>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@stop