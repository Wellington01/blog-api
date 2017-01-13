<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
	public function index(){
		
		$posts = Post::all();

		return response()->json($posts);
	}

    public function show($id){

        $post = Post::find($id);

        return response()->json($post, 200);
    }
	
	public function store(Request $request){

		$post = new Post();
		$post->fill($request->all());

		$post->save();
		
		return response()->json($post, 201);
	}

    public function update(Request $request, $id){

        $Post = Post::find($id);

        if(!$Post){
            return response()->json([
                'message' => 'Record not found'
            ],404);
        }

        $Post->fill($request->all());
        $Post->save();

        return response()->json($Post);
    }

    public function destroy($id){

        $post = Post::find($id);

        if(!$post){
            return response()->json([
                'message' => 'Record not found'
            ],404);
        }

        $post->delete();
        return response()->json(['message' => 'success']);
    }
}
