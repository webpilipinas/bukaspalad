<?php
class Home_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'nonauth');
	}
    public function action_index()
    {
        return View::make('home.index', array(
        	'hide_status_plugin' => true
        ));
    }
}