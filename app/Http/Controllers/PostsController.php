<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ValidatePost;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('isPaginate') === 'true' || $request->exists('page')) {
            $paginate = Post::paginate(5)->toArray();
            $items = array_get($paginate, 'data');
            $pagination = array_except($paginate, 'data');

            return compact('items', 'pagination');
        } else {
            $items = Post::all();

            return compact('items');
        }
    }
    
    public function show(Post $post)
    {
        return compact('post');
    }
    
    public function store(ValidatePost $request)
    {
        $post = Post::create($request->all());
        
        return compact('post');
    }
    
    public function update(ValidatePost $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();
        
        return compact('post');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response(['success' => 'Excluído com sucesso.'], 200);
    }
}
