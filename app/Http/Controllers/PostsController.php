<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }

   
   
    public function index()
    {    
        return view('blog.index',['posts' => Post::OrderBy('updated_at', 'desc')->paginate(20)
    ]);


    }


    public function create()
    {

        return view('blog.create');


    
    }

    
    public function store(PostFormRequest $request)
    {

        $request->validated();

       $post = Post::create([
            'user_id' =>Auth::id(),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published=='on',
            'min_to_read' => $request->min_to_read

       ]);

         $post->meta()->create([
              'post_id' => $post->id,
              'meta_description' => $request->meta_description,
              'meta_keywords' => $request->meta_keywords,
              'meta_robots' => $request->meta_robots,
         ]);
       return redirect(route('blog.index'));
        
    }

   
    public function show($id)
    {
      
        return view('blog.show',[
            'post' => Post::findOrFail($id)
        ]);


    }

  
    public function edit($id)
    {
        return view('blog.edit',[
            'post' => Post::where('id', $id)->first()
        ]);

        
    }

   
    public function update(PostFormRequest $request, $id)
    {
        

        $request->validated();

        Post::where('id', $id)->update(
            $request->except(['_token', '_method'])
        );

        return redirect(route('blog.index'));

    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('blog.index'))->with('message', 'Post deleted');
        
    }

    

    public function storeImage($request)
    {
        $newImageName = uniqid().'-'.$request->title.'.'.
        $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);

    }


    //logout function
    public function logout()
    {
        Auth::logout();
        return redirect(route('blog.index'));
    }


}
