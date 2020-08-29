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
    public function show()
 {
  $data_parkir = Parkir::join('customers', 'customers.id_custom', 'parkir.id_custom')->get();
  return Response()->json($data_parkir);
 }
 public function detail($id)
 {
  if (Parkir::where('id', $id)->exist()) {
      $data_parkir = Parkir::join('customers', 'customers.id_custom', 'parkir.id_custom')->where('parkir.id', '=', $id)->get();
      return Response()->json($data_parkir);
  }
  else{
    return Response()->json(['message' => 'Tidak Ditemukan']);
  }
 }
}
