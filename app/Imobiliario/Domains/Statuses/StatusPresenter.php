<?php

namespace Imobiliario\Domains\Statuses;

use Imobiliario\Core\BasePresenter;

class StatusPresenter extends BasePresenter {

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
