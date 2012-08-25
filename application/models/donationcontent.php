<?php
class DonationContent extends Eloquent
{
	public static $timestamps = true;

	public function donation()
	{
		return $this->belongs_to('Donation');
	}

	public function stock()
	{
		return $this->belongs_to('Stock');
	}

	public function getSku()
	{
		return $this->stock->sku;
	}

	public function getUnit()
	{
		return $this->stock->unit;
	}
}