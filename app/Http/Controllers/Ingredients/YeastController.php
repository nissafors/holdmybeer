<?php

namespace App\Http\Controllers\Ingredients;

use App\Yeast;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class YeastController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'vendorId' => 'min:1',
        'vendorsProductId' => 'required|string',
        'classId' => 'required|integer|min:1',
        'alcoholTolerance' => 'required|integer',
        'minAttenuation' => 'required|integer',
        'maxAttenuation' => 'required|integer',
        'minFermentationTemp' => 'required|integer',
        'maxFermentationTemp' => 'required|integer',
        'minRehydrationTemp' => 'integer',
        'maxRehydrationTemp' => 'integer',
        'form' => 'required|string',
        'flocculation' => 'required|string',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yeasts = Yeast::with('vendor', 'yeastClass')->get();

        return response()->json($yeasts);
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

        $minRehydrationTemp = $request->input('minRehydrationTemp') == 0 ? null : $request->input('minRehydrationTemp');
        $maxRehydrationTemp = $request->input('maxRehydrationTemp') == 0 ? null : $request->input('maxRehydrationTemp');

        Yeast::create([
            'name' => $request->input('name'),
            'vendorId' => $request->input('vendorId'),
            'vendorsProductId' => $request->input('vendorsProductId'),
            'classId' => $request->input('classId'),
            'alcoholTolerance' => $request->input('alcoholTolerance'),
            'minAttenuation' => $request->input('minAttenuation'),
            'maxAttenuation' => $request->input('maxAttenuation'),
            'minFermentationTemp' => $request->input('minFermentationTemp'),
            'maxFermentationTemp' => $request->input('maxFermentationTemp'),
            'minRehydrationTemp' => $minRehydrationTemp,
            'maxRehydrationTemp' => $maxRehydrationTemp,
            'form' => $request->input('form'),
            'flocculation' => $request->input('flocculation'),
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
        $yeasts = Yeast::with('vendor', 'yeastClass')->find($id);

        return response()->json($yeasts);
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

        $minRehydrationTemp = $request->input('minRehydrationTemp') == 0 ? null : $request->input('minRehydrationTemp');
        $maxRehydrationTemp = $request->input('maxRehydrationTemp') == 0 ? null : $request->input('maxRehydrationTemp');

        $yeast = Yeast::find($id);
        $yeast->name = $request->input('name');
        $yeast->vendorId = $request->input('vendorId');
        $yeast->vendorsProductId = $request->input('vendorsProductId');
        $yeast->classId = $request->input('classId');
        $yeast->alcoholTolerance = $request->input('alcoholTolerance');
        $yeast->minAttenuation = $request->input('minAttenuation');
        $yeast->maxAttenuation = $request->input('maxAttenuation');
        $yeast->minFermentationTemp = $request->input('minFermentationTemp');
        $yeast->maxFermentationTemp = $request->input('maxFermentationTemp');
        $yeast->minRehydrationTemp = $minRehydrationTemp;
        $yeast->maxRehydrationTemp = $maxRehydrationTemp;
        $yeast->form = $request->input('form');
        $yeast->flocculation = $request->input('flocculation');

        $yeast->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Yeast::destroy($id);
    }
}
