<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\dthm;
use App\dtpsk;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveData (Request $request)
    {
        $validator = request()->validate([
                "p_title" => "required",
                "p_decs" => "required",
                "location" => "required",
                "payment" => "required",
                "type" => "required",
                "cost" => "required",
        ]);
        // if ($validator){
            $dtpsk = new dtpsk;
            $data = $dtpsk->displayData($request);
            // $data->p_title = $request->input('p_title');
            // $data->p_desc = $request->input('p_decs');
            // $data->p_view = '0';
            // $data->avail = '1';
            // $data->location = $request->input('location');
            // $data->address = $request->input('address');
            // $data->room = $request->input('room');
            // $data->bathroom = $request->input('bathroom');
            // $data->kitchen = $request->input('kitchen') == null ? '0' : $request->input('kitchen');
            // $data->garage = $request->input('garage') == null ? '0' : $request->input('kitchen');
            // $data->payment = $request->input('payment');
            // $data->type = $request->input('type');
            // $data->cost = $request->input('cost');
            // $data->user_id = $request->input('user_id'); 
            // dd($data);
            // $data->save();
            // return back()->with('success', 'User created successfully.');
            return view('exDisplay', compact('data'));
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function saveDB(Request $request){
        $dtpsk = new dtpsk;

        $data = $dtpsk->storeData($request);
        // $dt = json_decode($data, true);
            if ($data['status'] == "success"){
                $msg = 'data di simpan';

            return view('success', compact('msg'));
            }

            // $data->save();
            
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        $data = $request;
        $status = 'edit';
        return view('newpost', compact('data', 'status') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
