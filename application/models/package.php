<?php
class Package extends Eloquent
{
	public static $timestamps = true;

	public function donations()
	{
		return $this->has_many('Donation');
	}

	public function transport()
	{
		return $this->belongs_to('Transport');
	}
}