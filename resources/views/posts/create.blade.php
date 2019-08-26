@extends('main')

@section('content')
<form method="post" action="{{route('posts.store')}}">

    @csrf
    <div>
        @include('posts._form')
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add Post</button>
</form>

@endsection