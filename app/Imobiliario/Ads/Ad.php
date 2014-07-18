<?php

namespace Imobiliario\Ads;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Ad extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'realty_id',
		'company_id',
		'company_code',
		'body',
		'published_at',
		'price',
		'currency_id',
		'url',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ads';

	protected $presenter = 'Imobiliario\Ads\AdPresenter';

}
