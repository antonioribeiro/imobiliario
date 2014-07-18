<?php

namespace Imobiliario\Realties;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Realty extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = ['address_id'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'realties';

	protected $presenter = 'Imobiliario\Realties\RealtyPresenter';

	public function address()
	{
		return $this->belongsTo('Imobiliario\Addresses\Address');
	}

	public function unitType()
	{
		return $this->belongsTo('Imobiliario\UnitTypes\UnitType', 'unit_type_id');
	}
}
