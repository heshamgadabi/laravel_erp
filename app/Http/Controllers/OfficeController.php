<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfficeRequest;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{

    public function index()
    {
            $count = Office::withTrashed()->where('id','>',15)->sum('id');
            echo "Total Offices : ".$count."<br>";
        
            //$data_office = Office::all();
            
            //$data_office = Office::paginate(3);

            $data_office = DB::table('office')->get();
            
          // $data_office = DB::select('SELECT * FROM office WHERE id > 0 ORDER BY id DESC');
          
          // $data_office = Office::where('id','>',8)->orderBy('id','DESC')->take(3)->get();
            

           return view('Offices',['data_office'=>$data_office]);

    }

    public function create()
    {
        return view('create_office');
    }

    public function store(StoreOfficeRequest $request)
    {
        /*
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        */
        
    
        $title = $request->title;
        $description = $request->description;

        Office::create(['title' => $title , 'description' => $description]);
        
        return redirect('/offices');

    }

    public function edit($id)
    {
        $office = Office::find($id);
        
        return view('edit_office',['office'=>$office]); 
    }
    
    public function edit_office_save(Request $request , $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        
        $title = $request->title;
        $description = $request->description;

        $office = Office::find($id);
        /*
        $office->title = $title;
        $office->description = $description;
        $office->save();
        */
        $office->update(['title' => $title , 'description' => $description]);
        
        return redirect('/offices');
    
    }

    public function delete($id)
    {
       // $office = Office::find($id);

        $office = Office::withTrashed()->find($id);
        
        if($office->trashed()){
            $office->restore();
        
            }else {
            $office->delete();
        
            }
             
        return redirect('/offices');
    }

    public function final_delete($id)
    {
        $office = Office::withTrashed()->find($id);
        $office->forceDelete();
        
        return redirect('/offices');
    }

}