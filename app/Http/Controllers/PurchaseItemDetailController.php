<?php

namespace App\Http\Controllers;

use App\Models\Purchase_item_detail;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\Product_type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PurchaseItemDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Purchase_item = Purchase_item_detail::with('purchase', 'project', 'product_type')->paginate(10);
        return view('admin.purchase-items.index', ['Purchase_items' => $Purchase_item]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Projects = Project::all();
        $Purchases = Purchase::all();
        $Product_type = Product_type::all();
        return view('admin.purchase-items.create', ['projects'=> $Projects, 'purchases'=> $Purchases, 'types'=> $Product_type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required',
            'project_id' => 'required',
            'serial_number' => 'required',
            'location' => 'required',
            'remarks' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Purchase_item = new Purchase_item_detail();
            $Purchase_item->product_id = $request->product_id;
            $Purchase_item->purchase_id = $request->purchase_id;
            $Purchase_item->project_id = $request->project_id;
            $Purchase_item->serial_number = $request->serial_number;
            $Purchase_item->location = $request->location;
            $Purchase_item->remarks = $request->remarks;
            $Purchase_item->save();
            return response()->json([
                'status' => 200,
                'success' => 'Purchase Item Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase_item_detail $purchase_item_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Purchase_item = Purchase_item_detail::find($id);
        $Projects = Project::all();
        $Purchases = Purchase::all();
        $Product_type = Product_type::all();
        return view('admin.purchase-items.edit', ['Purchase_item'=>$Purchase_item, 'projects'=> $Projects, 'purchases'=> $Purchases, 'types'=> $Product_type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Purchase_item = Purchase_item_detail::find($id);
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'purchase_id' => 'required',
            'project_id' => 'required',
            'serial_number' => 'required',
            'location' => 'required',
            'remarks' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Purchase_item->product_id = $request->product_id;
            $Purchase_item->purchase_id = $request->purchase_id;
            $Purchase_item->project_id = $request->project_id;
            $Purchase_item->serial_number = $request->serial_number;
            $Purchase_item->location = $request->location;
            $Purchase_item->remarks = $request->remarks;
            $Purchase_item->save();
            return response()->json([
                'status' => 200,
                'success' => 'Purchase Item Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Purchase_item_detail::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Purchase Item Record Deleted successfully!',
        ]);
    }
}
