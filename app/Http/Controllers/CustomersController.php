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


        public function update($id, Request $request)
 {
 		$validator=Validator::make($request->all(),
 			[
 				'nama_custom' => 'required'
 			]
 		);
 		if($validator->fails()) {
 			return Response()->json($validator->errors());
 		}
 		$ubah = Customers::where('id_custom', $id)->update([
 				'nama_custom' => $request->nama_custom
 		]);
 		if($ubah) {
 			return Response()->json(['status' => 1]);
 		}
 		else {
 			return Response()->json(['status' => 0]);
 	}
 }
 		public function destroy($id){
 			$hapus = Customers::where('id_custom', $id)->delete();
 			if($hapus)	{
 				return Response()->json(['status' => 1]);
 			}
 			else {
 				return Response()->json(['status' => 0]);
 			}
 		}
}
