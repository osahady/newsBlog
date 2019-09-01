@extends('main')

@section('content')

<form action="{{route('register')}} " method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{old('name')}} " 
        class="form-control" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" value="{{old('email')}} " 
        class="form-control" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" class="form-control" required>
    </div>
    <div>
        <label for="password_confirmation">Retype</label>
        <input type="text" name="password_confirmation" class="form-control" required>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Register</button>
</form>
@endsection