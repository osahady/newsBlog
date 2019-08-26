@extends('main')

@section('content')
<div>
    
    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>
</div>
<p>{{$post->created_at->diffForHumans()}}</p>

@if((new Carbon\Carbon())->diffInMinutes($post->created_at) > 5)
    <p> old </p> 
@else
    <p> New </p>
@endif
@endsection