<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Project_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Project = DB::table('projects')
        //     ->join('project_categories', 'projects.category_id', '=', 'project_categories.id')
        //     ->select('projects.*', 'project_categories.name')
        //     ->paginate(10);
        $Project = Project::Paginate(10);
        return view('admin.project.index', ['Projects' => $Project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Project_category = Project_category::all();
        return view('admin.project.create', ['categories' => $Project_category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Project = new Project();
            $Project->name = $request->name;
            $Project->category_id = $request->category_id;
            $Project->save();
            return response()->json([
                'status' => 200,
                'success' => 'Project Record Added successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Project = Project::find($id);
        $Project_category = Project_category::all();
        return view('admin.project.edit', ['categories'=>$Project_category, 'Projects'=>$Project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Project = Project::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors(),
            ]);
        } else {
            $Project->name = $request->name;
            $Project->category_id = $request->category_id;
            $Project->save();
            return response()->json([
                'status' => 200,
                'success' => 'Project Record Updated successfully!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return response()->json([
            'status'=> 300,
            'success'=> 'Project Record Deleted successfully!',
        ]);
    }
}
