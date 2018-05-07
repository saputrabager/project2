<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()

	{
	    $this->middleware('auth');
	}

	public function index()
	{
		return view('category');
	}

	public function store(Request $request){
    	$category = new Category;
    	$input = request()->all();

    	request()->validate([

            'category' => 'required',

        ]);

    	$count = Category::where('CATEGORY', $input['category'])->count();
    	if ($count==1){
    		$validate = '0';
    		return $validate;
    	} else {
    		$category->CATEGORY = $input['category'];
    		$category->save();
    		$validate = 1;
    		return $validate;
    	}
    }

     public function update(Request $request){
        $category = new Category;
        $input = request()->all();

        request()->validate([

            'category' => 'required',

        ]);

        $count = Category::where('CATEGORY', $input['category'])->count();
    	if ($count==1){
    		$validate = '0';
    		return $validate;
    	} else {
    		$category = Category::find($input['id']);

	        $category->CATEGORY = $input['category'];

	        $category->save();
        
            $validate = 1;
            return $validate;
    	}

        
    }

    public function getName(Request $request){
        $category = new Category;
        $data = $category::select('CATEGORY')
                           ->get();
        return $data;
    }

    public function delet($id){

        Category::destroy($id);
        $response = 1;
        return $response;
        
    }
}
