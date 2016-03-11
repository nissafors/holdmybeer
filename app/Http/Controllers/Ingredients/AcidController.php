<?php

namespace App\Http\Controllers\Ingredients;

use App\Acid;
use App\WaterTreatment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AcidController extends Controller
{
     private $rules = [
        'name' => 'required|string',
        'form' => 'required|in:Dry,Liquid',
        'concentration' => 'required|integer',
        'mEqPerL' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acids = DB::table('HoldMyBeer_Acid')
            ->join('HoldMyBeer_WaterTreatment', 'HoldMyBeer_Acid.waterTreatmentId', "=", 'HoldMyBeer_WaterTreatment.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor',
                'HoldMyBeer_Acid.mEqPerL'
            )
            ->get();

        return response()->json($acids);
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

        $waterTreatment = WaterTreatment::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
            'form' => $request->input('form'),
            'concentration' => $request->input('concentration')
        ]);

        Acid::create([
            'waterTreatmentId' => $waterTreatment->id,
            'mEqPerL' => $request->input('mEqPerL')
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
        $acids = DB::table('HoldMyBeer_Acid')
            ->join('HoldMyBeer_WaterTreatment', 'HoldMyBeer_Acid.waterTreatmentId', "=", 'HoldMyBeer_WaterTreatment.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor',
                'HoldMyBeer_Acid.mEqPerL'
            )
            ->where('HoldMyBeer_WaterTreatment.id', '=', $id)
            ->get();

        return response()->json($acids[0]);
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
        $waterTreatment->form = $request->input('form');
        $waterTreatment->concentration = $request->input('concentration');

        $acid = Acid::where('waterTreatmentId', $id)->first();
        $acid->waterTreatmentId = $id;
        $acid->mEqPerL = $request->input('mEqPerL');

        $waterTreatment->save();
        $acid->save();
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
