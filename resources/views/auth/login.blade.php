@extends('main')

@section('content')

<form action="{{route('login')}} " method="POST">
    @csrf
    
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
    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" name="remember" 
             class="form-check-input" value="{{old('remember') ? 'checked' : ''}} ">
            <label for="remember" class="form-check-label">Remember Me</label>
        </div>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Login</button>
</form>
@endsection