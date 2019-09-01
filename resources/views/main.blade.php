<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}} ">
    <title>Document</title>

</head>
<body>
   {{-- <ul>
    <li><a href="{{route('home')}}">home</a></li> 
    <li><a href="{{route('posts.index')}}">Posts</a></li>
    <li><a href="{{route('posts.create')}}">Create a Post</a></li>    
    <li><a href="{{route('services') }}">services</a></li>
    <li><a href="{{route('contact')}}">contact</a></li>
    <li><a href="/about">about</a></li>
   </ul> --}}

   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel Blog</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('home') }}">Home</a>
            <a class="p-2 text-dark" href="{{ route('contact') }}">Contact</a>
            <a class="p-2 text-dark" href="{{ route('posts.index') }}">Posts</a>
            <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Post</a>
            <a class="p-2 text-dark" href="{{ route('auth.register') }}">Register</a>
        </nav>
    </div>
    <div class="container">
         @if (session()->has('status'))
            <p style="color:green">
                {{session()->get('status')}}
            </p>       
        @endif
        @yield('content')
    </div>

    <script src="{{mix('js/app.js')}}"> </script>
</body>
</html>