<?php

namespace App\Http\Controllers\Ingredients;

use App\WaterTreatment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WaterTreatmentController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'concentration' => 'required|integer',
        'form' => 'required|string',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Water treatments except Acid and Salt
        $watertreatments = DB::table('HoldMyBeer_WaterTreatment')
            ->leftJoin('HoldMyBeer_Acid', 'HoldMyBeer_Acid.waterTreatmentId', '=', 'HoldMyBeer_WaterTreatment.id')
            ->whereNull('HoldMyBeer_Acid.WaterTreatmentId')
            ->leftJoin('HoldMyBeer_Salt', 'HoldMyBeer_Salt.waterTreatmentId', '=', 'HoldMyBeer_WaterTreatment.id')
            ->whereNull('HoldMyBeer_Salt.waterTreatmentId')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->get();

        return response()->json($watertreatments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        WaterTreatment::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
            'concentration' => $request->input('concentration'),
            'form' => $request->input('form')
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
        $watertreatments = DB::table('HoldMyBeer_WaterTreatment')
            ->leftJoin('HoldMyBeer_Acid', 'HoldMyBeer_Acid.waterTreatmentId', '=', 'HoldMyBeer_WaterTreatment.id')
            ->whereNull('HoldMyBeer_Acid.WaterTreatmentId')
            ->leftJoin('HoldMyBeer_Salt', 'HoldMyBeer_Salt.waterTreatmentId', '=', 'HoldMyBeer_WaterTreatment.id')
            ->whereNull('HoldMyBeer_Salt.waterTreatmentId')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->where('HoldMyBeer_WaterTreatment.id', '=', $id)
            ->get();

        return response()->json($watertreatments[0]);
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
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        $waterTreatment = WaterTreatment::find($id);
        $waterTreatment->name = $request->input('name');
        $waterTreatment->vendorId = $vendorId;
        $waterTreatment->concentration = $request->input('concentration');
        $waterTreatment->form = $request->input('form');

        $waterTreatment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WaterTreatment::destroy($id);
    }
}
