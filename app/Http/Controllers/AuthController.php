<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transformers\UserTransformer;
use Auth;

class AuthController extends Controller
{
	public function register(Request $request, User $user)
	{
		$this->validate($request, [
			'email' 								=> 'required|email|unique:users',
			'password'							=> 'required|min:6',
			'confirmation_password'	=> 'required|min:6|same:password',
		]);

		$user->create([
			'name'					=> $request->email,
			'email'					=> $request->email,
			'password'			=> bcrypt($request->password),
			'access_token'	=> bcrypt($request->email),
			'photo'					=> 'http://188.166.247.62/freedom/users/1eeabd7c-fe2d-4b15-8a7c-d3d1768f19a1/avatar/',
		]);

		return response()->json([
			'success'	=> true,
			'message'	=> 'user registration success',
			'data'		=> null
		]);
	}

	public function login(Request $request, User $user)
	{
		if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return response()->json(['success' => false], 401);
		}

		$user = $user->find(Auth::user()->id);

		return response()->json([
			'success'	=> true,
			'message'	=> 'you are successfully logged in',
			'data' 		=> [
				'id' 						=> $user->id,
				'name'					=> $user->name,
				'photo'					=> $user->photo,
				'email'					=> $user->email,
				'access_token'	=> $user->access_token
			]
		]);
	}

	public function logout(User $user)
	{
	
		$user = $user->find(Auth::user()->id);
	
		return fractal()
			->item($user)
			->transformWith(new UserTransformer)
			->toArray();
	}
}
