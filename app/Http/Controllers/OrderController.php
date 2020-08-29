<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
	public function store(Request $request)
    {
    	$validator=Validator::make($request->all(),
    		[
    			'jumlah' => 'required',
    			'bill' => 'required',
    			'id_prod' => 'required'
    		]
    	);

    	if($validator->fails()){
    		return Response()->json($validator->errors());
    	}
    	$simpan = Order::create([
    		'jumlah' => $request->jumlah,
    		'bill' => $request->bill,
    		'id_prod' => $request->id_prod
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
  $data_order = Order::join('product', 'product.id_prod', 'order.id_prod')->get();
  return Response()->json($data_order);
 }
 public function detail($id)
 {
  if (Order::where('id', $id)->exist()) {
      $data_order = Order::join('product', 'product.id_prod', 'order.id_prod')->where('order.id', '=', $id)->get();
      return Response()->json($data_order);
  }
  else{
    return Response()->json(['message' => 'Tidak Ditemukan']);
  }
 }
}
