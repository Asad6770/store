<?php

namespace App\Http\Controllers;

use App\Models\Destroyed_item;
use Illuminate\Http\Request;

class DestroyedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.destroyed-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.destroyed-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Destroyed_item $destroyed_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destroyed_item $destroyed_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destroyed_item $destroyed_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destroyed_item $destroyed_item)
    {
        //
    }
}
