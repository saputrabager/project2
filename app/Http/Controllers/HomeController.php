<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = new inventory;
        $val = $inventory->get();
        // print_r($val);exit;
        
        return view('dashboard', compact('val'));
    }

    public function newpost(){
        return view('newpost');
    }

    public function create()

    {

        return view('createUser');

    }

    public function store()

    {

        $input = request()->validate([

                'name' => 'required',

                'password' => 'required|min:5',

                'email' => 'required|email|unique:users'

            ], [

                'name.required' => 'Name is required',

                'password.required' => 'Password is required'

            ]);



        $input = request()->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);



        return back()->with('success', 'User created successfully.');

    }
}
