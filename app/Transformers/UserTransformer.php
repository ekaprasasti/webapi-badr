<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
			'id'						=> $user->id,
			'name' 					=> $user->name,
			'photo'					=> $user->photo,
			'email'					=> $user->email,
			'access_token'	=> $user->access_token
		];
	}
}
