<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Suppliers = Supplier::paginate(10);
        return view('admin.supplier.index',compact('Suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_number' => 'required',
            'supplier_cnic' => 'required',
            'supplier_address' => 'required',
            'supplier_email' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Supplier = new supplier();
            $Supplier->supplier_name = $request->supplier_name;
            $Supplier->supplier_number = $request->supplier_number;
            $Supplier->supplier_cnic = $request->supplier_cnic;
            $Supplier->supplier_address = $request->supplier_address;
            $Supplier->supplier_email = $request->supplier_email;
            $Supplier->create_by = Auth::id();
            $Supplier->save();
            return response()->json([
                'status' => 200,
                'success' => 'Contractor Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
