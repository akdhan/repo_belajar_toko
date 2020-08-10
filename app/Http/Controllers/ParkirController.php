<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;
use Illuminate\Support\Facades\Validator;

class ParkirController extends Controller
{
	public function store(Request $request)
    {
    	$validator=Validator::make($request->all(),
    		[
    			'kendaraan' => 'required',
    			'id_custom' => 'required',
    		]
    	);

    	if($validator->fails()){
    		return Response()->json($validator->errors());
    	}
    	$simpan = Parkir::create([
    		'kendaraan' => $request->kendaraan,
    		'id_custom' => $request->id_custom,
    	]);

    	if ($simpan) {
    		return Response()->json(['status'=>1]);
    	}
    	else {
    		return Response()->json(['status'=>0]);
    	}
    }
}
