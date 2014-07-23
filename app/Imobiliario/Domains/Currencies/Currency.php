<?php

namespace Imobiliario\Domains\Currencies;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Currency extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'name',
		'code',
		'symbol',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'currencies';

	protected $presenter = 'Imobiliario\Domains\Currencies\CurrencyPresenter';

}
