<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventory;

class inventoryController extends Controller
{
	public function __construct()

	{
	    $this->middleware('auth');
	}

    public function store(Request $request)
    {
    	$inventory = new inventory;
    	$input = request()->all();

    	request()->validate([

            'figure' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',

        ]);

    	$no_asset = inventory::where('no_equipment', $input['no_equipment'])->count();
    	if ($no_asset==1){
    		$validate = '0';
    		return $validate;
    	} else { 

    		$image = $request->file('figure');
		    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
		    $destinationPath = public_path('/images');
		    $image->move($destinationPath, $input['imagename']);

		    // $this->postImage->add($input);

    		$inventory->NO_ASSET = $input['no_asset'];
            $inventory->NO_EQUIPMENT = $input['no_equipment'];
    		$inventory->DESCRIPTION = $input['description'];
    		$inventory->MIC = $input['mic'];
    		$inventory->BOOK_VALUE = $input['book_val'];
    		$inventory->CATEGORY = $input['category'];
    		$inventory->PARENT = $input['parent'];
    		$inventory->LOCATION = $input['location'];
    		$inventory->CONDITIONS = $input['condition'];
    		$inventory->FIGURE = $input['imagename'];
    		$inventory->save();
    		$validate = 1;
    		return $validate;
    	}

    }

    public function update(Request $request)
    {
        $inventory = new inventory;
        $input = request()->all();

        request()->validate([

            'figure' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',

        ]);

        
        

            $image = $request->file('figure');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

            // $this->postImage->add($input);
            $no_asset = $inventory::where('no_asset', $input['no_asset'])
            ->update([
                'NO_EQUIPMENT' => $input['no_equipment'],
                'NO_ASSET' => $input['no_asset'],
                'DESCRIPTION' => $input['description'],
                'MIC' => $input['mic'],
                'BOOK_VALUE' => $input['book_val'],
                'CATEGORY' => $input['category'],
                'PARENT' => $input['parent'],
                'LOCATION' => $input['location'],
                'CONDITIONS' => $input['condition'],
                'FIGURE' => $input['imagename']
            ]);
            
            $validate = 1;
            return $validate;

    }

    public function getInventoryById($asset){
    	$inventory = new inventory;

    	$requestedAsset  = $asset;
    	$no_asset = inventory::where('no_equipment', $asset)->first();

    	return $no_asset;
    	
    }

    public function delet($id){
        $inventory = inventory::where('no_equipment', '=', $id)->delete();

        // return redirect()->route('home')->with('delete', 'data deleted successfully.');;
        $validate = '1';
        return $validate;
        
    }

    public function afterD($id){

         return view('dashboard' , compact('id'));
    }
}
