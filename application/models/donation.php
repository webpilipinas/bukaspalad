<?php
class Donation extends Eloquent
{
	public static $timestamps = true;

	public function donationcontents()
	{
		return $this->has_many('DonationContent');
	}

	public function package()
	{
		return $this->belongs_to('Package');
	}
}