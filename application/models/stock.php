<?php
class Stock extends Eloquent
{
	public static $timestamps = true;

	public static function upsertStock($sku, $unit)
	{
		if( empty($sku) || empty($unit) ) {
			return null;
		}

		$stock = Stock::where('sku', '=', $sku)->first();
		if( !is_null($stock) ) {
			$stock->unit = $unit;
		} else {
			$stock = new Stock();
			$stock->fill(array(
				'sku' => $sku,
				'unit' => $unit
			));
		}
		$stock->save();

		return $stock;
	}
}