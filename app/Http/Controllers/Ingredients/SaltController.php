<?php

namespace App\Http\Controllers\Ingredients;

use App\Salt;
use App\WaterTreatment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SaltController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'form' => 'required|in:Dry,Liquid',
        'concentration' => 'required|integer',
        'cationId' => 'required|integer|min:1',
        'anionId' => 'required|integer|min:1',
        'cationPpmAtOneGPerL' => 'required|numeric',
        'anionPpmAtOneGPerL' => 'required|numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salts = DB::table('HoldMyBeer_Salt')
            ->join('HoldMyBeer_WaterTreatment', 'HoldMyBeer_Salt.waterTreatmentId', "=", 'HoldMyBeer_WaterTreatment.id')
            ->join('HoldMyBeer_Ion as Cation', 'HoldMyBeer_Salt.cationId', '=', 'Cation.id')
            ->join('HoldMyBeer_Ion as Anion', 'HoldMyBeer_Salt.anionId', '=', 'Anion.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor',
                'Cation.id as cationId',
                'Cation.symbol as cation',
                'Anion.id as anionId',
                'Anion.symbol as anion',
                'HoldMyBeer_Salt.cationPpmAtOneGPerL',
                'HoldMyBeer_Salt.anionPpmAtOneGPerL'
            )
            ->get();

        return response()->json($salts);
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

        Salt::create([
            'waterTreatmentId' => $waterTreatment->id,
            'cationId' => $request->input('cationId'),
            'anionId' => $request->input('anionId'),
            'cationPpmAtOneGPerL' => $request->input('cationPpmAtOneGPerL'),
            'anionPpmAtOneGPerL' => $request->input('anionPpmAtOneGPerL'),
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
        $salts = DB::table('HoldMyBeer_Salt')
            ->join('HoldMyBeer_WaterTreatment', 'HoldMyBeer_Salt.waterTreatmentId', "=", 'HoldMyBeer_WaterTreatment.id')
            ->join('HoldMyBeer_Ion as Cation', 'HoldMyBeer_Salt.cationId', '=', 'Cation.id')
            ->join('HoldMyBeer_Ion as Anion', 'HoldMyBeer_Salt.anionId', '=', 'Anion.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_WaterTreatment.vendorId')
            ->select(
                'HoldMyBeer_WaterTreatment.id',
                'HoldMyBeer_WaterTreatment.name',
                'HoldMyBeer_WaterTreatment.concentration',
                'HoldMyBeer_WaterTreatment.form',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor',
                'Cation.id as cationId',
                'Cation.symbol as cation',
                'Anion.id as anionId',
                'Anion.symbol as anion',
                'HoldMyBeer_Salt.cationPpmAtOneGPerL',
                'HoldMyBeer_Salt.anionPpmAtOneGPerL'
            )
            ->where('HoldMyBeer_WaterTreatment.id', '=', $id)
            ->get();

        return response()->json($salts[0]);
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

        $salt = Salt::where('waterTreatmentId', $id)->first();
        $salt->cationId = $request->input('cationId');
        $salt->anionId = $request->input('anionId');
        $salt->cationPpmAtOneGPerL = $request->input('cationPpmAtOneGPerL');
        $salt->anionPpmAtOneGPerL = $request->input('anionPpmAtOneGPerL');

        $waterTreatment->save();
        $salt->save();
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
