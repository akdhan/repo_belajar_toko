<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	public function store(Request $request)
    {
    	$validator=Validator::make($request->all(),
    		[
    			'nama_prod' => 'required',
    			'tanggal_exp' => 'required',
    			'harga_prod' => 'required'
    		]
    	);

    	if($validator->fails()){
    		return Response()->json($validator->errors());
    	}
    	$simpan = Product::create([
    		'nama_prod' => $request->nama_prod,
    		'tanggal_exp' => $request->tanggal_exp,
    		'harga_prod' => $request->harga_prod
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
        return Product::all();
    }
}

