@extends('adminlte::page')

@section('title', 'Characters')

@section('content_header')
    <h1>Characters</h1>
@stop

@section('content')
    <p>List of all characters on the films.</p>

    <div class="content">
            <div class="row">
                <div class="col-md-15">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th colspan="16">List of Movies</th>
                            </tr>
                            <tr>
                                <th class="col-md-2">Name</th>
                                <th class="col-md-2">Gender</th>
                                <th class="col-md-2">Age</th>
                                <th class="col-md-2">Eye Color</th>
                                <th class="col-md-1">Hair Color</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($people))
                            @foreach($people as $p)
                            <tr>
                                <th>{{$p->name}}</th>
                                <th>{{$p->gender}}</th>
                                <th>{{$p->age}}</th>
                                <th>{{$p->eye_color}}</th>
                                <th>{{$p->hair_color}}</th>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop