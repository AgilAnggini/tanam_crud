<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flora;
use App\Models\Type;

class FloraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flora = Flora::with('type')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all flora",
            'data' => $flora
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flora = Flora::create([
            'name' => $request->name,
            'class' =>$request->class,
            'type_id' => $request->type_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create the flora",
            'data' => $flora
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(flora $flora)
    {
        $flora = Flora::with('type')->find($flora->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the flora".$flora->id,
            'data' => $flora
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flora $flora)
    {
        $flora->update([
            'name' => $request->name,
            'class' =>$request->class,
            'type_id' => $request->type_id,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update the flora".$flora->id,
            'data' => $flora
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flora $flora)
    {
        $flora->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete the flora".$flora->id,
            'data' => ""
        ]);
    }
}
