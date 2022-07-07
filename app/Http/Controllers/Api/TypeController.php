<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::with('animal')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all type",
            'data' => $type
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
        $type = Type::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create the type",
            'data' => $type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $type = Type::with('animal')->find($type->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get the type".$type->id,
            'data' => $type
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
    public function update(Request $request, Type $type)
    {
        $type->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update the type".$type->id,
            'data' => $type
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete the type".$type->id,
            'data' => ""
        ]);
    }
}
