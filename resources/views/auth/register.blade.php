@extends('main')

@section('content')

<form action="{{route('register')}} " method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{old('name')}} " 
        class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " required>
       
        @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}} </strong>
            </span>    
        @endif

    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" value="{{old('email')}} " 
        class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} " required>
        
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('email')}} </strong>
            </span>    
        @endif

    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" 
        class="form-control {{$errors->has('password') ? 'is-invalid' : ''}} " required>
        
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password')}} </strong>
            </span>    
        @endif

    </div>
    <div>
        <label for="password_confirmation">Retype</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      
    </div>
    <button class="btn btn-primary btn-block" type="submit">Register</button>
</form>
@endsection