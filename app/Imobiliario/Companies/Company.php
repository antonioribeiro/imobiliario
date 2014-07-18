<?php

namespace Imobiliario\Companies;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Company extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'name',
		'cnpj',
		'website',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	protected $presenter = 'Imobiliario\Companies\CompanyPresenter';

}
