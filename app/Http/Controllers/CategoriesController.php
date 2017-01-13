<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoriesController extends Controller
{

    public function __construct(){

        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

    	//$this->categories = $categories;
    }

	public function index(){
		
		$categories = Categories::all();
		
		return response()->json($categories);
	}

    public function show($id){

        $category = Categories::find($id);

        return response()->json($category, 200);
    }
	
	public function store(Request $request){

		$category = new Categories();
		$category->fill($request->all());
		$category->save();
		
        return response()->json($request, 201);
	}

    public function update($id){

        //$id = $request->all()->id;

        $category = Categories::find($id);

        // if(!$category){
        //     return response()->json([
        //         'message' => 'Record not found'
        //     ],404);
        // }

        // $category->fill($request->all());
        // $category->save();

        return response()->json($category);
    }

    public function destroy($id){

        $category = Categories::find($id);

        if(!$category){
            return response()->json([
                'message' => 'Record not found'
            ],200);
        }

        if($category->posts){
            return response()->json([
                'error' => 'Não foi possível excluir, existe post relacionado com essa categoria.'
            ],200);
        }else{

        }

        $category->delete();

        return response()->json(['message' => 'success']);
    }
}
