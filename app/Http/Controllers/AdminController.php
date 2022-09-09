<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class AdminController extends Controller
{

	public function form (){

		return response()->json([
			'message' => 'Halman form admin'		
		],200);
	}



	public function add_kasir (Request $request){

		$kasir = Kasir::create([
			'nama_kasir' => $request->nama_kasir,
			'no_hp' => $request->no_hp,
			'alamat' => $request->alamat

		]);


		if ($kasir) {
			
			$out = [
				"message" => "add_data_success",
				"kasir" => $kasir,
				"code"    => 201,
			];
		} else {
			$out = [
				"message" => "failed_add_data",
				"code"   => 400,
			];
		}

		return response()->json($out, $out['code']);
	}



	public function get_kasir()
	{
		$kasir =  KAsir::all();

		// $get_menu = Menu::where('id_lapak', $lapak->id)->where('status', '!=', 'dihapus')->orderBy('id', 'DESC')->get();

		// // $get_menu = lapak::withCount('menu')->orderBy('lapak_count', 'DESC')->get();

		return response()->json([

			'Kasir' => $kasir

		]);
	}




}
