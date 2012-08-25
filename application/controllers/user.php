<?php
class User_Controller extends Base_Controller
{
	public $restful = true;

	public function post_authenticate()
	{
		$input = Input::get();
		$input['group_pin'] = Config::get('settings.pin');
		$rules = array(
    		'username' => 'required|alpha_dash',
    		'pin' => 'required',
    		'group_pin' => 'required|same:pin'
    	);

    	$messages = array(
    		'same' => 'The pin your provided did not match the group pin'
    	);

    	$validation = Validator::make($input, $rules, $messages);

    	if( $validation->fails() ) {
    		return Redirect::to('home')->with_input()->with_errors($validation);
    	}

    	$user = User::upsertUser($input['username'], $input['pin']);

    	Auth::login($user->id);

    	return Redirect::to('dashboard');
	}
}