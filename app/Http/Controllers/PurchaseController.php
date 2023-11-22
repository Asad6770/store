<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Purchase = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->select('purchases.*', 'suppliers.name')
            ->paginate(10);
        return view('admin.purchase.index', ['Purchases'=> $Purchase]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('admin.purchase.create', ['suppliers'=> $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'part_number' => 'required',
            'supplier_id' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $purchase = new Purchase();
            $purchase->name = $request->name;
            $purchase->part_number = $request->part_number;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->photo = $request->photo;
            if ($request->hasfile('photo')){
                $path = 'files/';
                $file = $request->file('photo');
                $fileName = time().'_'.$file->getClientOriginalName();
                $upload = $file->storeAs($path, $fileName, 'public');
                $purchase->photo = $fileName;
            }
            $purchase->save();
            return response()->json([
                'status' => 200,
                'success' => 'Purchase Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        $supplier = Supplier::all();
        return view('admin.purchase.edit', ['purchase'=>$purchase, 'suppliers'=>$supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'part_number' => 'required',
            'supplier_id' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $purchase->name = $request->name;
            $purchase->part_number = $request->part_number;
            $purchase->supplier_id = $request->supplier_id;
            if ($request->hasfile('photo')){
                $path = 'files/';
                $file = $request->file('photo');
                $fileName = time().'_'.$file->getClientOriginalName();
                $upload = $file->storeAs($path, $fileName, 'public');
                $purchase->photo = $fileName;
            }
            $purchase->save();
            return response()->json([
                'status' => 200,
                'success' => 'Purchase Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Purchase::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Purchase Record Deleted successfully!',
        ]);
    }
}
