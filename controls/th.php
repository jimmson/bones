<?php
namespace bones\controls;

use bones\base\control;

class th extends control
{
	public function __construct( $_name )
	{
	    parent::__construct( $_name );
	    
	    $this->set_named( false );
	}
}


