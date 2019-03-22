@extends('adminlte::page')

@section('title', 'Movie Crawler')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to the Movie Crawler.</p>

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
                                <th class="col-md-3">Characters</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($movie))
                            @foreach($movie as $m)
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