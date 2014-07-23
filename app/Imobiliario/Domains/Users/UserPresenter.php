<?php

namespace Imobiliario\Domains\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

	/**
	 * Present the link to the user's gravatar.
	 *
	 * @param int $size
	 * @return string
	 */
	public function gravatar($size = 30)
	{
		$email = md5($this->email);

		return "//www.gravatar.com/avatar/{$email}?s={$size}";
	}

}
