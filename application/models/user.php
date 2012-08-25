<?php
class User extends Eloquent
{
	public static $timestamps = true;

	public function actions()
	{
		return $this->has_many('Action');
	}
	
	public static function upsertUser($username, $pin)
	{
		$user = User::where('username', '=', $username)->first();
		if( is_null($user) ) {
			$user = new User();
			$user->fill(array(
				'username' => $username,
				'password' => Hash::make($pin)
			));
			$user->save();
		}

		return $user;
	}

	public function determineColor()
	{
		switch($this->id%4) {
	        case 1:
	            return 'blue';
	            break;

	        case 2:
	            return 'red';
	            break;

	        case 3:
	            return 'yellow';
	            break;
	        
	        case 0:
	            return 'white';
	            break;
	    }
	}
}