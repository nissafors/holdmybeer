<?php

namespace App\Http\Controllers\Ingredients;

use App\Fining;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FiningController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'vendorId' => 'min:1',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finings = Fining::with('vendor')->get();

        return response()->json($finings);
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

        Fining::create([
            'name' => $request->input('name'),
            'vendorId' => $vendorId,
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
        $finings = Fining::with('vendor')->find($id);

        return response()->json($finings);
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

        $fining = Fining::find($id);
        $fining->name = $request->input('name');
        $fining->vendorId = $vendorId;

        $fining->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fining::destroy($id);
    }
}
