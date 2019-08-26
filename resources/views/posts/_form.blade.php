    <div class="form-group">
        <label>Title: </label>
        <input type="text" name="title" class="form-control" 
        value=" {{old('title', $post->title ?? null)}}  ">
    </div><br>
    <div class="form-goup">
        <label>Content: </label>
        <input type="text" name="content" class="form-control"
        value="{{old('content', $post->content ?? null)}} ">
    </div>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $e)
                    <li>
                        {{$e}}
                    </li>
                @endforeach 
            </ul>
        </div>
    @endif
