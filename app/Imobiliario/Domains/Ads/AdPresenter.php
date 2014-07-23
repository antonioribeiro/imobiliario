<?php

namespace Imobiliario\Domains\Ads;

use h4kuna\NumberFormat;
use Illuminate\Support\Str;
use Laracasts\Presenter\Presenter;

class AdPresenter extends Presenter {

	/**
	 * Present the link to the user's gravatar.
	 *
	 * @return string
	 */
	public function formattedPrice()
	{
		$f = new NumberFormat($this->currency->code);

//		$f->setDecimal($this->currency->decimals);
		$f->setDecimal(0);
		$f->setThousand($this->currency->thousands_separator);
		$f->setPoint($this->currency->decimal_point);
		$f->setSymbol($this->currency->symbol);
		$f->setMask('S 1');

		return $f->render($this->price);
	}

	public function abbreviatedAddress()
	{
		return ($this->realty->address->neighborhood ? $this->realty->address->neighborhood . ' - ' : '') .
				$this->realty->address->city . ' - ' .
				$this->realty->address->state->code;
	}

	public function abbreviatedBody()
	{
		return Str::limit($this->body, 260);
	}

	public function mainCharacteristics()
	{
		$c = [];

		foreach($this->characteristics as $characteristic)
		{
			$c[] = $characteristic->abbreviation . ': ' . $characteristic->pivot->quantity;
		}

		return $c;
	}
}
