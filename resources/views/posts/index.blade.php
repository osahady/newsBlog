@extends('main')

@section('content')
    <div class="row">
        <div class="col-8">
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
        </div>

        <div class="col-4">
            <div class="container">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Most Commented</h5>
                        <p class="card-text">People are currently talking about: </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostCommented as $post)
                            <a href="{{ route('posts.show', $post->id) }}">
                                <li class="list-group-item">{{ $post->title }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>

                <div class="card mt-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Most Active Users</h5>
                        <p class="card-text">People that are active: </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($mostActive as $user)

                            <li class="list-group-item">{{ $user->name }}</li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>







    </div>
@endsection
