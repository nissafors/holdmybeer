<?php

namespace App\Http\Controllers\Ingredients;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fermentable;
use Illuminate\Support\Facades\DB;

class FermentableController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'vendorId' => 'min:1',
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
        // Fermentables except Grain, Sugar and MaltExtract
        $fermentables = DB::table('HoldMyBeer_Fermentable')
            ->leftJoin('HoldMyBeer_Grain', 'HoldMyBeer_Grain.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_Grain.fermentableId')
            ->leftJoin('HoldMyBeer_MaltExtract', 'HoldMyBeer_MaltExtract.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_MaltExtract.fermentableId')
            ->leftJoin('HoldMyBeer_Sugar', 'HoldMyBeer_Sugar.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_Sugar.fermentableId')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_Fermentable.vendorId')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->get();

        return response()->json($fermentables);
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

        Fermentable::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
            'maxHWE' => $request->input('maxHWE'),
            'degEBC' => $request->input('degEBC'),
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
        $fermentables = DB::table('HoldMyBeer_Fermentable')
            ->leftJoin('HoldMyBeer_Grain', 'HoldMyBeer_Grain.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_Grain.fermentableId')
            ->leftJoin('HoldMyBeer_MaltExtract', 'HoldMyBeer_MaltExtract.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_MaltExtract.fermentableId')
            ->leftJoin('HoldMyBeer_Sugar', 'HoldMyBeer_Sugar.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->whereNull('HoldMyBeer_Sugar.fermentableId')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Vendor.id', '=', 'HoldMyBeer_Fermentable.vendorId')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->where('HoldMyBeer_Fermentable.id', '=', $id)
            ->get();

        return response()->json($fermentables[0]);
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

        $fermentable = Fermentable::find($id);
        $fermentable->name = $request->input('name');
        $fermentable->vendorId = $vendorId;
        $fermentable->maxHWE = $request->input('maxHWE');
        $fermentable->degEBC = $request->input('degEBC');

        $fermentable->save();
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
