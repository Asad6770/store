<?php

namespace App\Http\Controllers;

use App\Models\Comsumption_detail;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product_type;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchase_item_detail;

class ComsumptionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Comsumption_detail = Comsumption_detail::with('purchase', 'product_type')->paginate(10);
        return view('admin.consumption-detail.index', ['comsumption_details' => $Comsumption_detail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product_type::all();
        $purchase = Purchase::all();
        return view('admin.consumption-detail.create', ['products' => $product, 'purchases' => $purchase]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required',
            'type' => 'required',
            'serial_number' => 'required',
            'date' => 'required|date',
            'remarks' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Comsumption_detail = new Comsumption_detail();
            $Comsumption_detail->product_id = $request->product_id;
            $Comsumption_detail->purchase_id = $request->purchase_id;
            $Comsumption_detail->type = $request->type;
            
            $Comsumption_detail->date = $request->date;
            $Comsumption_detail->remarks = $request->remarks;
            if (Purchase_item_detail::where('serial_number', $request->serial_number)->exists()) {
                $Comsumption_detail->serial_number = $request->serial_number;
            } else {
                return response()->json([
                    'status' => 200,
                    'success' => 'Serial Number not Available in Database!',
                ]);
            }
            $Comsumption_detail->save();
            return response()->json([
                'status' => 200,
                'success' => 'Comsumption Detail Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comsumption_detail $comsumption_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Comsumption_detail = Comsumption_detail::find($id);
        $product = Product_type::all();
        $purchase = Purchase::all();
        return view('admin.consumption-detail.edit', ['comsumption_detail'=> $Comsumption_detail, 'products' => $product, 'purchases' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Comsumption_detail = Comsumption_detail::find($id);
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required',
            'type' => 'required',
            'serial_number' => 'required',
            'date' => 'required|date',
            'remarks' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Comsumption_detail->product_id = $request->product_id;
            $Comsumption_detail->purchase_id = $request->purchase_id;
            $Comsumption_detail->type = $request->type;
           $Comsumption_detail->serial_number = $request->serial_number;
            $Comsumption_detail->date = $request->date;
            $Comsumption_detail->remarks = $request->remarks;
            $Comsumption_detail->save();
            return response()->json([
                'status' => 200,
                'success' => 'Comsumption Detail Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comsumption_detail::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Comsumption Detail Record Deleted successfully!',
        ]);
    }
}
