<?php

namespace Imobiliario\Statuses;

use Imobiliario\Core\BaseModel;
use Imobiliario\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends BaseModel {

	use EventGenerator;

	protected $fillable = ['body'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

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

}
