<?php

namespace Imobiliario\Domains\Statuses;

use Imobiliario\Core\BaseModel;
use Imobiliario\Domains\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends BaseModel {

	use EventGenerator, PresentableTrait;

	protected $fillable = ['body'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	protected $presenter = 'Imobiliario\Domains\Statuses\StatusPresenter';

	/**
	 * Publish a new status
	 *
	 * @param $body
	 * @return static
	 */
	public static function publish($body)
	{
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($status));

		return $status;
	}

	public function user()
	{
		return $this->belongsTo('Imobiliario\Domains\Users\User');
	}
}
