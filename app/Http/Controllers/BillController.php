<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $bills = Bill::all();
        
        return view('bills.index', compact('bills'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bills.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'total' => 'required|numeric',
        ]);
        
        $bill_data = [];
        $bill_data ['name'] = $request->name;
        $bill_data ['total'] = $request->total;

        Bill::create($bill_data);
        return redirect()->route('bill.index');
         //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $bill = Bill::findOrFail($id);
            return view('bills.edit', compact('bill'));
            
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'total' => 'required|numeric',
        ]);
        $bill_data = [];
        $bill_data ['name'] = $request->name;
        $bill_data ['total'] = $request->total; 

        $bill = Bill::find($id);
        $bill->update($bill_data);
        return redirect()->route('bill.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            Bill::destroy($id);
            return redirect()->route('bill.index'); 
        //
    }
}
