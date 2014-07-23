<?php

namespace Imobiliario\Domains\Realties;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Realty extends BaseModel {

	use EventGenerator, PresentableTrait;

	/**
	 * Define fillable columns.
	 *
	 * @var array
	 */
	protected $fillable = ['address_id'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'realties';

	/**
	 * The presenter used by this model.
	 *
	 * @var string
	 */
	protected $presenter = 'Imobiliario\Domains\Realties\RealtyPresenter';

	/**
	 * The address related to this realty.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function address()
	{
		return $this->belongsTo('Imobiliario\Domains\Addresses\Address');
	}

	/**
	 * The unit type related to this realty.
	 *
	 *  eg: apartment, house, office
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function unitType()
	{
		return $this->belongsTo('Imobiliario\Domains\UnitTypes\UnitType', 'unit_type_id');
	}
}
