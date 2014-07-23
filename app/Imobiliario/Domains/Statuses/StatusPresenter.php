<?php

namespace Imobiliario\Domains\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter {

	/**
	 * Present the time since published in a human format
	 *
	 * @return string
	 */
	public function timeSincePublished()
	{
		return $this->created_at->diffForHumans();
	}

}
