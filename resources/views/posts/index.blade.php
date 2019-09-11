@extends('main')

@section('content')
    @forelse($posts as $post)
        
        <a href="{{route('posts.show', ['post' => $post->id])}} "><h1> {{$post->title}}</h1></a>
        <p class="text-muted">
        {{$post->created_at->diffForHumans()}}
            by {{$post->user->name}}
        </p>
        @if ($post->comments_count)
            <p>{{$post->comments_count}} comments </p>
        @else
            <p>No comments yet!</p>
        @endif

        @can('update', $post)
            <a href="{{route('posts.edit', ['post' => $post->id])}} " 
           class="btn btn-primary">Edit</a>
        @endcan

        @can('delete', $post)
            <form method="POST" class="fm-inline"
                action="{{route('posts.destroy', ['post'=>$post->id]) }}">
                @csrf
                @method('DELETE')           
                <input type="submit" value="DELETE" class="btn btn-primary" />
            </form>
        @endcan
      
    @empty
        <p>There is no post. . . </p>
    @endforelse 
@endsection 