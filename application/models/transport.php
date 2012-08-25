<?php
class Transport extends Eloquent
{
	public static $timestamps = true;

	public function packages()
	{
		return $this->has_many('Package');
	}

	public function transporting()
	{
		return $this->belongs_to('Package');
	}
}