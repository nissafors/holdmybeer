<?php

namespace App\Http\Controllers\Ingredients;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'countryId' => 'min:1|'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::with('country')->get();

        return response()->json($vendors);
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
        $name = $request->input('name');

        $this->validate($request, $this->rules);

        Vendor::create([
            'name' => $name,
            'countryId' => $countryId
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
        $vendors = Vendor::with('country')->find($id);

        return response()->json($vendors);
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
        $name = $request->input('name');

        $this->validate($request, $this->rules);

        $vendor = Vendor::find($id);
        $vendor->name = $name;
        $vendor->countryId = $countryId;

        $vendor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::destroy($id);
    }
}
