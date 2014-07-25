<?php

namespace Imobiliario\Domains\Realties;

use Illuminate\Support\Str;
use Imobiliario\Core\BasePresenter;
use h4kuna\NumberFormat;

class RealtyPresenter extends BasePresenter {

	/**
	 * Present the realty price, formatted.
	 *
	 * @return string
	 */
	public function formattedPrice()
	{
		$f = new NumberFormat($this->cheapest->currency->code);

		//$f->setDecimal($this->cheapest->currency->decimals);
		$f->setDecimal(0);
		$f->setThousand($this->cheapest->currency->thousands_separator);
		$f->setPoint($this->cheapest->currency->decimal_point);
		$f->setSymbol($this->cheapest->currency->symbol);
		$f->setMask('S 1');

		return $f->render($this->cheapest->price);
	}

	public function abbreviatedAddress()
	{
		return ($this->address->neighborhood ? $this->address->neighborhood . ' - ' : '') .
		$this->address->city . ' - ' .
		$this->address->state->code;
	}

	public function abbreviatedBody()
	{
		return Str::limit($this->cheapest->body, 260);
	}

	public function mainCharacteristics()
	{
		$c = [];

		foreach($this->cheapest->characteristics as $characteristic)
		{
			$c[] = $characteristic->abbreviation . ': ' . $characteristic->pivot->quantity;
		}

		return $c;
	}

}
