<?php

namespace Imobiliario\Statuses;

use Imobiliario\Statuses\Status;

class StatusRepository {

	public function save(Status $status)
	{
		return $status->save();
	}

}
