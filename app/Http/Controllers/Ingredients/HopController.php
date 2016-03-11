<?php

namespace App\Http\Controllers\Ingredients;

use App\Hop;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HopController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'countryId' => 'required|min:1',
        'typicalAA' => 'required|numeric|min:0'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hops = Hop::with('country')->get();

        return response()->json($hops);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countryId = $request->input('countryId') == 0 ? null : $request->input('countryId');

        $this->validate($request, $this->rules);

        Hop::create([
            'name' => $request->input('name'),
            'countryId' => $countryId,
            'typicalAA' => $request->input('typicalAA')
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
        $hops = Hop::with('country')->find($id);

        return response()->json($hops);
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
        $countryId = $request->input('countryId') == 0 ? null : $request->input('countryId');

        $this->validate($request, $this->rules);

        $hop = Hop::find($id);
        $hop->name = $request->input('name');
        $hop->countryId = $countryId;
        $hop->typicalAA = $request->input('typicalAA');
        $hop->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hop::destroy($id);
    }
}
