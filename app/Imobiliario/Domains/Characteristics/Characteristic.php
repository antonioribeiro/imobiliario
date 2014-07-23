<?php

namespace Imobiliario\Domains\Characteristics;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Characteristic extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'name',
		'abbreviation',
		'importance',
		'is_float',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'characteristics';

	protected $presenter = 'Imobiliario\Domains\Characteristics\CharacteristicPresenter';

}
