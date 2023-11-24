<?php

namespace App\Http\Controllers;

use App\Models\Product_consumption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_consumption = Product_consumption::with('user', 'created_by')->paginate(10);
        return view('admin.product-consumption.index', ['Product_consumptions'=> $product_consumption]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('admin.product-consumption.create', ['users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'date' => 'required|date',
            'remarks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Product_consumption = new Product_consumption();
            $Product_consumption->user_id = $request->user_id;
            $Product_consumption->date = $request->date;
            $Product_consumption->remarks = $request->remarks;
            $Product_consumption->create_by = Auth::id();
            $Product_consumption->save();
            return response()->json([
                'status' => 200,
                'success' => 'Product Consumption Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_consumption $product_consumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::all();
        $Product_consumption = Product_consumption::find($id);
        return view('admin.product-consumption.edit', ['users' => $user, 'Product_consumption' => $Product_consumption]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Product_consumption = Product_consumption::find($id);
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'date' => 'required|date',
            'remarks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Product_consumption->user_id = $request->user_id;
            $Product_consumption->date = $request->date;
            $Product_consumption->remarks = $request->remarks;
            $Product_consumption->create_by = Auth::id();
            $Product_consumption->save();
            return response()->json([
                'status' => 200,
                'success' => 'Product Consumption Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product_consumption::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Product Consumption Record Deleted successfully!',
        ]);
    }
}
