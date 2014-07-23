<?php

namespace Imobiliario\Domains\Countries;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Country extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'name',
		'code',
		'currency_id',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'countries';

	protected $presenter = 'Imobiliario\Domains\Countries\CountryPresenter';

}
