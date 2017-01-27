<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateCategory;
use App\Http\Requests;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('isPaginate') === 'true' || $request->exists('page')) {
            $paginate = Category::with('posts')->paginate(10)->toArray();
            $items = array_get($paginate, 'data');
            $pagination = array_except($paginate, 'data');

            return compact('items', 'pagination');
        } else {
            $items = Category::with('posts')->get();

            return compact('items');
        }
    }
    
    public function show(Category $category)
    {
        return compact('category');
    }
    
    public function store(ValidateCategory $request)
    {
        $category = Category::create($request->all());
        
        return compact('category');
    }
    
    public function update(ValidateCategory $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        
        return compact('category');
    }
    
    public function destroy(Category $category)
    {
        if ($category->posts->count()) {
            return response([
                'error' => 'Não foi possível excluir, existe post relacionado com essa categoria.'
            ], 200);
        }
        
        $category->delete();

        return response(['success' => 'Excluído com sucesso.'], 200);
    }
}
