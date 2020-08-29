<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
     public function store(Request $request)
    {
    	$validator=Validator::make($request->all(),
    		[
    			'nama_custom' => 'required'
    		]
    	);

    	if($validator->fails()){
    		return Response()->json($validator->errors());
    	}
    	$simpan = Customers::create([
    		'nama_custom' => $request->nama_custom
    	]);

    	if ($simpan) {
    		return Response()->json(['status'=>1]);
    	}
    	else {
    		return Response()->json(['status'=>0]);
    	}
    }
        public function show()
    {
        return Customers::all();
    }
}
