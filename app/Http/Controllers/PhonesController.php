<?php

namespace App\Http\Controllers;

use App\Models\Phones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phones::get()->toJson(JSON_PRETTY_PRINT);
        return response($phones, 200);
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
     * @return \Illuminate\Support\MessageBag
     */
    public function store(Request $request)
    {
        $rules = [
            'brand' => 'required|min:1|max:50',
            'model' => 'required|min:1|max:100',
            'price' => 'required|min:1|max:9999',
            'produced_date' => 'required',
            'color' =>'required',
            'memory_limit' =>'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return  $validator->messages();
        }
        else{
            $phones = new Phones();
            $phones->brand = $request ->input('brand');
            $phones->model = $request ->input('model');
            $phones->price = $request ->input('price');
            $phones->produced_date = $request ->input('produced_date');
            $phones->color = $request ->input('color');
            $phones->memory_limit = $request ->input('memory_limit');
            $phones->save();
            return response()->json([
                "message" => "Record has been added"
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $phones = Phones::find($id);
        if (Phones::where('id', $id)->exists()) {

            $phones->brand = $request ->input('brand',$phones->brand);
            $phones->model = $request ->input('model',$phones->model);
            $phones->price = $request ->input('price',$phones->price);
            $phones->produced_date = $request ->input('produced_date',$phones->produced_date);
            $phones->color = $request ->input('color',$phones->color);
            $phones->memory_limit = $request ->input('memory_limit',$phones->memory_limit);
            $phones->save();


            return response()->json([
                "message" => "Record has been updated"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if(Phones::where('id', $id)->exists()) {
            $phones = Phones::find($id);
            $phones->delete();

            return response()->json([
                "message" => "Record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Record was deleted or missing"
            ], 404);
        }
    }
    public function filter(Request $request)
    {

        $filter = $request->input('brand');
        if(Phones::where('brand', $filter)->exists()) {
            return Phones::all()->where('brand','=',$filter);
        } else {
            return response()->json([
                "message" => "Record was deleted or missing"
            ], 404);
        }

    }
}
