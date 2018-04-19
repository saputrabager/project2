<?php
namespace App;

use Illuminate\Http\Request;
use App\inventory;

$inventory = new inventory;

    	$requestedAsset  = $_REQUEST['no_asset'];
    	$no_asset = inventory::find($requestedAsset); print_r($requestedAsset);exit;

    	if ($requestedAsset == $no_asset['NO_ASSET']){
    		return false ; 
    	} else {
    		echo true;
    	}