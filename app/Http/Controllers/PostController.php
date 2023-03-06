<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('blog.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post= new Post;
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->description = $request->input('description');

if($request->hasfile('image'))
{
$file = $request->file('image');
$extension=$file->getClientOriginalExtension();
$filename=time() . '.'.$extension;
$file->move('uploads/blog/',$filename);
$post->image = $filename;
}

        $post->status = $request->input('status') == true ? '1':'0';
        $post->save();
        return redirect()->back()->with('status','Post Added Successsfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $post= Post::find($id);
         $post->user_id = Auth::id();
         $post->title = $request->input('title');
         $post->description = $request->input('description');

         if($request->hasfile('image'))
         {

         $destination_path ='uploads/blog/'.$post->image;
         if(File::exists($destination_path)){
            File::delete($destination_path);
         }   
         $file = $request->file('image');
         $extension=$file->getClientOriginalExtension();
         $filename=time() . '.'.$extension;
         $file->move('uploads/blog/',$filename);
         $post->image = $filename;
         }

         $post->status = $request->input('status') == true ? '1':'0';
         $post->update();
         return redirect()->back()->with('status','Post Updated Successsfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post= Post::find($id);
        $destination_path ='uploads/blog/'.$post->image;
        if(File::exists($destination_path)){
           File::delete($destination_path);
        }   
        $post->delete();
        return redirect()->back()->with('status','Post Deleted Successsfully');
    }
}
