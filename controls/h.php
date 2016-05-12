<?php
namespace bones\controls;

use bones\base\control;

class h extends control
{	
	const IMPORTANCE_1 = 1;
	const IMPORTANCE_2 = 2;
	const IMPORTANCE_3 = 3;
	const IMPORTANCE_4 = 4;
	const IMPORTANCE_5 = 5;
	const IMPORTANCE_6 = 6;

	public function __construct( $_name , $_importance = self::IMPORTANCE_1)
	{
		parent::__construct( $_name );

		$this->set_element("h" . $_importance);
	}

}


