@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="post" action="{{route('posts.store')}}">

            @csrf
            <div>
                @include('posts._form')
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Post</button>
        </form>
    </div>
</div>

@endsection