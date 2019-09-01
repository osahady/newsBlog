@extends('main')

@section('content')
    <form action="{{reoute('register')}} " method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control 
                    {{$errors->has('name') ? 'is-invalid' : ''}} " 
                    name="name" value="{{old('name')}} " required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control 
                    {{$errors->has('email') ? 'is-invalid' : ''}}" 
                    name="email" value="{{old('email')}} " required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control 
                    {{$errors->has('password') ? 'is-invalid' : ''}}" 
                    name="password" requried>
        </div>
        
        <div class="form-group">
            <label for="retype">Retype</label>
            <input type="password" class="form-control" 
                    name="retype" requried>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection