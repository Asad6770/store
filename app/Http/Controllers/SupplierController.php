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
        $Supplier = Supplier::paginate(10);
        return view('admin.supplier.index', ['Suppliers'=> $Supplier]);
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
            'name' => 'required',
            'number' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'email' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Supplier = new supplier();
            $Supplier->name = $request->name;
            $Supplier->number = $request->number;
            $Supplier->cnic = $request->cnic;
            $Supplier->ddress = $request->address;
            $Supplier->email = $request->email;
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
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', ['supplier'=>$supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'email' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $supplier->name = $request->name;
            $supplier->number = $request->number;
            $supplier->nic = $request->cnic;
            $supplier->address = $request->address;
            $supplier->email = $request->email;
            $supplier->create_by = Auth::id();
            $supplier->save();
            return response()->json([
                'status' => 200,
                'success' => 'Contractor Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Contractor Record Deleted successfully!',
        ]);
    }
}
