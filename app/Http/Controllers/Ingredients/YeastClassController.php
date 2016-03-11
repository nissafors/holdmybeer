<?php

namespace App\Http\Controllers\Ingredients;

use App\YeastClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class YeastClassController extends Controller
{
    private $rules = [
        'name' => 'required|string',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yeastClasses = YeastClass::all();

        return response()->json($yeastClasses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        YeastClass::create([
            'name' => $request->input('name'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yeastClasses = YeastClass::find($id);

        return response()->json($yeastClasses);
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
        $this->validate($request, $this->rules);

        $yeastClass = YeastClass::find($id);
        $yeastClass->name = $request->input('name');

        $yeastClass->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        YeastClass::destroy($id);
    }
}
