<?php

namespace Imobiliario\Domains\States;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class State extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'code',
		'name',
		'country_id',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'states';

	protected $presenter = 'Imobiliario\Domains\States\StatePresenter';

}
