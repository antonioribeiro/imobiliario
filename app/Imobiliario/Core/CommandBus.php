<?php

namespace Imobiliario\Core;

use App;

trait CommandBus {

	/**
	 * Execute the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function execute($command)
	{
		return $this->getCommandBus()->execute($command);
	}

	/**
	 * Get a CommandBus
	 *
	 * @return mixed
	 */
	public function getCommandBus()
	{
		return App::make('Laracasts\Commander\CommandBus');
	}

}
