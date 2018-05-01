<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;

class LocationController extends Controller
{
	public function __construct()

	{
	    $this->middleware('auth');
	}

    public function index(){
    	return view('location');
    }

    public function store(Request $request){
    	$location = new location;
    	$input = request()->all();

    	request()->validate([

            'loc_name' => 'required',

        ]);

    	$count = location::where('loc_name', $input['loc_name'])->count();
    	if ($count==1){
    		$validate = '0';
    		return $validate;
    	} else {
    		$location->LOC_NAME = $input['loc_name'];
    		$location->save();
    		$validate = 1;
    		return $validate;
    	}
    }

     public function update(Request $request){
        $location = new location;
        $input = request()->all();

        request()->validate([

            'loc_name' => 'required',

        ]);



        $location = location::find($input['id']);

        $location->LOC_NAME = $input['loc_name'];

        $location->save();
        
            $validate = 1;
            return $validate;
    }

    public function getName(Request $request){
        $location = new location;
        $data = $location::select('LOC_NAME')
                           ->get();
        return $data;
    }

    public function delet($id){

        location::destroy($id);
        $response = 1;
        return $response;
        
    }
}
