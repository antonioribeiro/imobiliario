<?php

namespace Imobiliario\UnitTypes;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class UnitType extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'name'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unit_types';

	protected $presenter = 'Imobiliario\UnitTypes\UnitTypePresenter';

	public function country()
	{
		return $this->belongsTo('Imobiliario\Countries\Country');
	}
}
