@extends('layouts.app')

@section('content')

    <h1>liste des articles</h1>


    @foreach($posts as $post)
        <h2>{{$post}}</h2>
    @endforeach

@endsection