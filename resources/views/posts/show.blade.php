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

    <h4>Comments</h4>
    @forelse ($post->comments as $comment)
        <ul>
            <li>{{$comment->content}}</li>
        </ul>
        
    @empty
        <p>No comments yet! . . .</p>
    @endforelse
@endsection