<?php

namespace App\Http\Controllers\Documento;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Documento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(Document::get(), 200);
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
        $rules = [
                'url_archivo_global' => 'required',
                'id_patient' => 'required',
                'id_employee' => 'required',
                ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        $Documento = Document::create($request->all());
        return response()->json($Documento, 201);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Documento = Document::find($id);
        if (is_null($Documento)) {
            return response()->json(["message" => "Record not found Bitch!"],404);
        }
        return response()->json($Documento,200);
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
    public function update(Request $request, $id)
    {
        $Documento = Document::find($id);
        if (is_null($Documento)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $Documento->update($request->all());
        return response()->json($Documento, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Documento = Document::find($id);
        if (is_null($Documento)) {
            return response()->json(["message" => "Record not found Bitch!"], 404);
        }
        $Documento->delete();
        return response()->json(null, 204);
    }
}
