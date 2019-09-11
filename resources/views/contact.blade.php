@extends('main')

@section('content')
    <h1>This is a contact page!</h1>

    @can('home.secret')
        <a href="{{route('secret')}} "> 
        <p> This is special details . . . </p></a>
    @endcan
@endsection