<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('posts')->get();
        
        return response()->json($categories);
    }
    
    public function show(Category $category)
    {
        
        return response()->json($category, 200);
    }
    
    public function store(Request $request)
    {
        
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        
        return response()->json($request, 201);
    }

    public function update(Request $request, Category $category)
    {
        if (!$category) {
            return response()->json([
            'message' => 'Record not found'
            ], 404);
        }
        
        $category->fill($request->all());
        $category->save();
        
        return response()->json($category);
    }
    
    public function destroy(Category $category)
    {
        
        if (!$category) {
            return response()->json([
            'error' => 'Erro ao excluir categoria.'
            ], 404);
        }
        
        if ($category->posts->count() > 0) {
            return response()->json([
            'error' => 'Não foi possível excluir, existe post relacionado com essa categoria.'
            ], 200);
        }
        
        $category->delete();
        return response()->json(['success' => 'Excluído com sucesso.'], 200);
    }
}
