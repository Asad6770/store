<?php

namespace App\Http\Controllers;

use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Product_type = Product_type::paginate(10);
        return view('admin.product.index', ['types' =>  $Product_type]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Product_type = new Product_type();
            $Product_type->name = $request->name;
            $Product_type->save();
            return response()->json([
                'status' => 200,
                'success' => 'Product Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_type $product_type)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product_type = Product_type::find($id);
        return view('admin.product.edit', ['type' => $Product_type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Product_type = Product_type::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Product_type->name = $request->name;
            $Product_type->save();
            return response()->json([
                'status' => 200,
                'success' => 'Product Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product_type::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Project Category Record Deleted successfully!',
        ]);
    }
}
