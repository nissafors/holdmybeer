<?php

namespace App\Http\Controllers\Ingredients;

use App\Fermentable;
use App\Grain;
use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GrainController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'vendorId' => 'min:1',
        'typeId' => 'required|min:1',
        'classId' => 'required|min:1',
        'maxHWE' => 'required|numeric',
        'degEBC' => 'required|integer',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grains = DB::table('HoldMyBeer_Grain')
            ->join('HoldMyBeer_GrainType', 'HoldMyBeer_Grain.typeId', '=', 'HoldMyBeer_GrainType.id')
            ->join('HoldMyBeer_GrainClass', 'HoldMyBeer_Grain.classId', '=', 'HoldMyBeer_GrainClass.id')
            ->join('HoldMyBeer_Fermentable', 'HoldMyBeer_Grain.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Fermentable.vendorId', '=', 'HoldMyBeer_Vendor.id')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_GrainType.id as grainTypeId',
                'HoldMyBeer_GrainType.name as grainType',
                'HoldMyBeer_GrainClass.id as grainClassId',
                'HoldMyBeer_GrainClass.name as grainClass',
                'HoldMyBeer_Grain.mash',
                'HoldMyBeer_Grain.steep',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->get();

        return response()->json($grains);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mash = $request->input('mash') == 'true' ? 1 : 0;
        $steep = $request->input('steep') == 'true' ? 1 : 0;
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        $fermentable = Fermentable::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
            'maxHWE' => $request->input('maxHWE'),
            'degEBC' => $request->input('degEBC'),
        ]);

        Grain::create([
            'fermentableId' => $fermentable->id,
            'typeId' => $request->input('typeId'),
            'classId' => $request->input('classId'),
            'mash' => $mash,
            'steep' => $steep
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
        $grains = DB::table('HoldMyBeer_Grain')
            ->join('HoldMyBeer_GrainType', 'HoldMyBeer_Grain.typeId', '=', 'HoldMyBeer_GrainType.id')
            ->join('HoldMyBeer_GrainClass', 'HoldMyBeer_Grain.classId', '=', 'HoldMyBeer_GrainClass.id')
            ->join('HoldMyBeer_Fermentable', 'HoldMyBeer_Grain.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Fermentable.vendorId', '=', 'HoldMyBeer_Vendor.id')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_GrainType.id as grainTypeId',
                'HoldMyBeer_GrainType.name as grainType',
                'HoldMyBeer_GrainClass.id as grainClassId',
                'HoldMyBeer_GrainClass.name as grainClass',
                'HoldMyBeer_Grain.mash',
                'HoldMyBeer_Grain.steep',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->where('HoldMyBeer_Fermentable.id', '=', $id)
            ->get();

        return response()->json($grains[0]);
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
        $mash = $request->has('mash') ? 1 : 0;
        $steep = $request->has('steep') ? 1 : 0;
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        $fermentable = Fermentable::find($id);
        $fermentable->name = $request->input('name');
        $fermentable->vendorId = $vendorId;
        $fermentable->maxHWE = $request->input('maxHWE');
        $fermentable->degEBC = $request->input('degEBC');

        $grain = Grain::where('fermentableId', $id)->first();
        $grain->typeId = $request->input('typeId');
        $grain->classId = $request->input('classId');
        $grain->mash = $mash;
        $grain->steep = $steep;

        $fermentable->save();
        $grain->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fermentable::destroy($id);
    }
}
