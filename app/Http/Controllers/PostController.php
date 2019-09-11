<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\StorePost;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'edit', 'destroy','store', 'update'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view ('posts.index', 
            ['posts' => BlogPost::withCount('comments')->get()]
        );
    }     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$request->session()->reflash();
        return view('posts.show', [
            'post' => BlogPost::with('comments')->findOrFail($id)
        ]);

    }

    public function create()
    {
        
        return view('posts.create');
    }

    public function store(StorePost $request)
    {
        $validatedData = $request->validated();        
        $blogpost = BlogPost::create($validatedData);//mass assginment
        

        // $blogpost->title = $request->input('title');
        // $blogpost->content = $request->input('content');
        // $blogpost->save();

        $request->session()->flash('status', 'Post has been Inserted Successfully!');
        return redirect()->route('posts.show', ['post'=>$blogpost->id]);
        
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        // if (Gate::denies('update-post', $post)) {
        //     abort(403, 'You can not update!');
        // }
        $this->authorize('update', $post);
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        // if (Gate::denies('update-post', $post)) {
        //     abort(403, 'You can not update!');
        // }
        $this->authorize('update', $post);

        $validatedData = $request->validated();
        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status', 'Post has been updated successfully!');
        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    public function destroy(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        // if (Gate::denies('delete-post', $post)) {
        //     abort(403, "You can not delete!");
        // }
        $this->authorize('delete', $post);
        $t = $post->title;
        $post->delete();
        //BlogPost::destroy($id);
        //$this->authorize($post);
        $request->session()->flash('status',$t.' Post has been deleted successfully!');
        return redirect()->route('posts.index');
    }
    
}

