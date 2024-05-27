<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


use App\Models\Post;

use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
{
    $posts = Post::all();
    return response()->json([
        'status' => empty($post) ? 'true' : 'false',
        'message' => empty($post) ? 'Data Found' : 'Data not Found',
        'data' => $posts,
    ]);
}

public function show($post_id)
{
    $post = Post::find($post_id);
    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }
    return response()->json([
        'status' => empty($post) ? 'true' : 'false',
        'message' => empty($post) ? 'Data Found' : 'Data not Found',
        'data' => $post
    ]);
}

public function store(Request $request)
{
    $data = $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'image' => 'required',
        'meta_title' => 'required',
        'meta_description' => 'required',
        'meta_keyword' => 'required',
        'status' => 'required'
    ]);

    
    $post = new Post;
    $post->category_id = $data['category_id'];
    $post->name = $data['name'];
    $post->slug = Str::slug($data['slug']);
    $post->description = $data['description'];
    $post->image = $data['image'];
    $post->meta_title = $data['meta_title'];
    $post->meta_description = $data['meta_description'];
    $post->meta_keyword = $data['meta_keyword'];
    $post->status = $data['status'];
    $post->created_by = Auth::user() ? Auth::user()->id : 1;
    $post->save();

    return response()->json(['message' => 'Post created successfully'], 201);
}

public function update(Request $request, $post_id)
{
    $data = $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'image' => 'required',
        'meta_title' => 'required',
        'meta_description' => 'required',
        'meta_keyword' => 'required',
        'status' => 'required'
    ]);

    $post = Post::find($post_id);
    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    $post->category_id = $data['category_id'];
    $post->name = $data['name'];
    $post->slug = Str::slug($data['slug']);
    $post->description = $data['description'];
      
    if($request->hasfile('image')){
        $destination = 'uploads/post/'.$post->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

       $file = $request->file('image');
       $filename = time().'.'.$file->getClientOriginalExtension();
       $file->move('uploads/post/',$filename);
       $post->image = $filename;
    }
    $post->meta_title = $data['meta_title'];
    $post->meta_description = $data['meta_description'];
    $post->meta_keyword = $data['meta_keyword'];
    $post->status = $data['status'];
    $post->created_by = Auth::user() ? Auth::user()->id : 2;
    $post->save();

    return response()->json([
        'message' => 'Post updated successfully']);
}

public function destroy($post_id)
{
    $post = Post::find($post_id);
    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    $post->delete();
    return response()->json(['message' => 'Post deleted successfully']);
}
}
