<?php
class Dashboard_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function action_index()
	{
		return View::make('dashboard.index', array(
			'transports' => Transport::all(),
			'stocks' => Stock::all(),
			'donations' => Donation::with('donationcontents')->all(),
			'packages' => Package::all(),
			'actions' => Action::order_by('created_at', 'desc')->take(10)->get()
        ));
	}
}