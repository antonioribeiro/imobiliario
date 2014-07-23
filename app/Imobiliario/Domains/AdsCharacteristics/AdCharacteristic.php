<?php

namespace Imobiliario\Domains\AdsCharacteristics;

use Imobiliario\Core\BaseModel;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class AdCharacteristic extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = [
		'realty_id',
		'characteristic_id',
		'quantity',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ads_characteristics';

	protected $presenter = 'Imobiliario\Domains\AdsCharacteristics\AdCharacteristicPresenter';

	public function characteristic()
	{
		return $this->belongsTo('Imobiliario\Domains\Characteristics\Characteristic')->orderBy('characteristic.importance', 'desc');
	}
}
