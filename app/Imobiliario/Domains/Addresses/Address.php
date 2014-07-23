<?php

namespace Imobiliario\Domains\Addresses;

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

	protected $presenter = 'Imobiliario\Domains\Addresses\AddressPresenter';

	public function country()
	{
		return $this->belongsTo('Imobiliario\Domains\Countries\Country');
	}

	public function state()
	{
		return $this->belongsTo('Imobiliario\Domains\States\State');
	}
}
