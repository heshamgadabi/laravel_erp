<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightsController extends Controller
{
    public function index()
    {
            
        $data_flight = Flight::all();
        
        return view('Flights',['data_flight'=>$data_flight]);
       
    }

    public function create()
    {
         return view('create_flight');//,['data_flight'=>$data_flight]);
    }

    public function save(Request $request)
    {
        $flight = new Flight();


        $firstname = $request->firstname;
       
        //Flight::create(['name'=>$firstname,'f_code'=>'22','notes'=>'nn','age'=>5]);
        $flight->create(['name'=>$firstname,'f_code'=>'22','notes'=>'nn','age'=>5]);
        return redirect('/flights');

         //return view('create_light');//,['data_flight'=>$data_flight]);
    }
}
