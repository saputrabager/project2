<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\inventory;
use App\Location;
use App\Ortu;
use App\Category;
use DataTables;

class DatatablesController extends Controller
{
    public function anyData()
    {

    $inventory = new inventory;

    $model = $inventory::query();

    return DataTables::of($model)->toJson();
    }

    public function anyLocation()
    {

    $location = new Location;

    $model = $location::query();

    return DataTables::of($model)->toJson();
    }

    public function anyOrtu()
    {

    $ortu = new Ortu;

    $model = $ortu::query();

    return DataTables::of($model)->toJson();
    }

    public function anyCategory()
    {

    $category = new Category;

    $model = $category::query();

    return DataTables::of($model)->toJson();
    }

    public function anyUser()
    {

    $user = new User;

    $model = $user::query();

    return DataTables::of($model)->toJson();
    }
}
