<?php

namespace App\Http\Controllers\Ingredients;

use App\Fermentable;
use App\MaltExtract;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MaltExtractController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'vendorId' => 'min:1',
        'maxHWE' => 'required|numeric',
        'degEBC' => 'required|integer',
        'form' => 'required|string',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extracts = DB::table('HoldMyBeer_MaltExtract')
            ->join('HoldMyBeer_Fermentable', 'HoldMyBeer_MaltExtract.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Fermentable.vendorId', '=', 'HoldMyBeer_Vendor.id')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_MaltExtract.form',
                'HoldMyBeer_MaltExtract.prehopped',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->get();

        return response()->json($extracts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prehopped = $request->has('prehopped') ? 1 : 0;
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        $fermentable = Fermentable::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
            'maxHWE' => $request->input('maxHWE'),
            'degEBC' => $request->input('degEBC'),
        ]);

        MaltExtract::create([
            'fermentableId' => $fermentable->id,
            'prehopped' => $prehopped,
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
        $extracts = DB::table('HoldMyBeer_MaltExtract')
            ->join('HoldMyBeer_Fermentable', 'HoldMyBeer_MaltExtract.fermentableId', '=', 'HoldMyBeer_Fermentable.id')
            ->leftJoin('HoldMyBeer_Vendor', 'HoldMyBeer_Fermentable.vendorId', '=', 'HoldMyBeer_Vendor.id')
            ->select(
                'HoldMyBeer_Fermentable.id',
                'HoldMyBeer_Fermentable.name',
                'HoldMyBeer_Fermentable.maxHWE',
                'HoldMyBeer_Fermentable.degEBC',
                'HoldMyBeer_MaltExtract.form',
                'HoldMyBeer_MaltExtract.prehopped',
                'HoldMyBeer_Vendor.id as vendorId',
                'HoldMyBeer_Vendor.name as vendor'
            )
            ->where('HoldMyBeer_Fermentable.id', '=', $id)
            ->get();

        return response()->json($extracts[0]);
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
        $prehopped = $request->has('prehopped') ? 1 : 0;
        $vendorId = $request->input('vendorId') == 0 ? null : $request->input('vendorId');

        $this->validate($request, $this->rules);

        $fermentable = Fermentable::find($id);
        $fermentable->name = $request->input('name');
        $fermentable->vendorId = $vendorId;
        $fermentable->maxHWE = $request->input('maxHWE');
        $fermentable->degEBC = $request->input('degEBC');

        $maltExtract = MaltExtract::find($id);
        $maltExtract->fermentableId = $fermentable->id;
        $maltExtract->prehopped = $prehopped;
        $maltExtract->form = $request->input('form');

        $fermentable->save();
        $maltExtract->save();
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
