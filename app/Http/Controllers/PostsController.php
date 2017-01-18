<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        
        return response()->json($posts);
    }
    
    public function show(Post $post)
    {

        return response()->json($post, 200);
    }
    
    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        
        $post->save();
        
        return response()->json($post, 201);
    }
    
    public function update(Request $request, Post $post)
    {
        if (!$post) {
            return response()->json([
            'message' => 'Record not found'
            ], 404);
        }
        
        $post->fill($request->all());
        $post->save();
        
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        if (!$post) {
            return response()->json([
            'error' => 'Erro ao excluir categoria.'
            ], 404);
        }
        
        $post->delete();
        return response()->json(['success' => 'Excluído com sucesso.']);
    }
}
