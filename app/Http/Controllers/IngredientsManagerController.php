<?php

namespace App\Http\Controllers;

use App\Country;
use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IngredientsManagerController extends Controller
{
    public function index()
    {
        //$vendors = Vendor::all();
        //foreach ($vendors as $vendor) {
        //    $vendor->country = $vendor->country();
        //}

        $data = [
            'title' => 'Ingredients Manager',
            'combobox' => TRUE,
            'countries' => Country::all(),
            'vendors' => Vendor::all()
        ];

        return view('ingredientsManager', $data);
    }
}
