<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ortu;

class OrtuController extends Controller
{
    public function __construct()

	{
	    $this->middleware('auth');
	}

	public function index()
	{
		return view('ortu');
	}

	public function store(Request $request){
    	$ortu = new Ortu;
    	$input = request()->all();

    	request()->validate([

            'ortu' => 'required',

        ]);

    	$count = Ortu::where('ORTU', $input['ortu'])->count();
    	if ($count==1){
    		$validate = '0';
    		return $validate;
    	} else {
    		$ortu->ORTU = $input['ortu'];
    		$ortu->save();
    		$validate = 1;
    		return $validate;
    	}
    }

     public function update(Request $request){
        $ortu = new Ortu;
        $input = request()->all();

        request()->validate([

            'ortu' => 'required',

        ]);

        $count = Ortu::where('ORTU', $input['ortu'])->count();
    	if ($count==1){
    		$validate = '0';
    		return $validate;
    	} else {
    		$ortu = Ortu::find($input['id']);

	        $ortu->ORTU = $input['ortu'];

	        $ortu->save();
        
            $validate = 1;
            return $validate;
    	}

        
    }

    public function getName(Request $request){
        $ortu = new Ortu;
        $data = $ortu::select('ORTU')
                           ->get();
        return $data;
    }

    public function delet($id){

        Ortu::destroy($id);
        $response = 1;
        return $response;
        
    }
}
