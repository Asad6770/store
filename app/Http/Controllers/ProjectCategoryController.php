<?php

namespace App\Http\Controllers;

use App\Models\Project_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Project_category = Project_category::paginate(10);
        return view('admin.project-category.index', ['categories' => $Project_category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-category.create');
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
            $Project_category = new Project_category();
            $Project_category->name = $request->name;
            $Project_category->save();
            return response()->json([
                'status' => 200,
                'success' => 'Project Category Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project_category $project_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Project_category = Project_category::find($id);
        return view('admin.project-category.edit', ['categories'=>$Project_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Project_category = Project_category::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Project_category->name = $request->name;
            $Project_category->save();
            return response()->json([
                'status' => 200,
                'success' => 'Project Category Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project_category::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Project Category Record Deleted successfully!',
        ]);
    }
}
