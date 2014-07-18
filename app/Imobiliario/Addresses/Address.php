<?php

namespace Imobiliario\Addresses;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Address extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'street',
		'number',
		'neighborhood',
		'city',
		'state',
		'country_id',
		'zipcode',
		'latitude',
		'longitude'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

	protected $presenter = 'Imobiliario\Addresses\AddressPresenter';

	public function country()
	{
		return $this->belongsTo('Imobiliario\Countries\Country');
	}
}
