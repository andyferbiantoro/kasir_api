<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
	public function login(Request $request){

		$user = User::where('email',$request->email)->first();

		if (!$user || !\Hash::check($request->password, $user->password)) {
			# code...
			return response()->json([
			'message' => 'salah bree'		
			],401);
		}

		$token = $user->createToken('token')->plainTextToken;

		return response()->json([
			'message' => 'Bener bree',
			'user'	=> $user,
			'token' => $token,	
			],201);
	}


	public function register(Request $request){

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' =>  bcrypt($request->password),
			'role' => $request->role

		]);


		if ($user) {
			
			$out = [
				"message" => "register_success",
				"user" => $user,
				"code"    => 201,
			];
		} else {
			$out = [
				"message" => "failed_regiser",
				"code"   => 400,
			];
		}

		return response()->json($out, $out['code']);
	}


	public function logout(Request $request){
		$user = $request->user();
		$user->currentAccessToken()->delete();

		return response()->json([
			'message' => 'berhasil logout'

		],200);
	}
}

