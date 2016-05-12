<?php
namespace bones\controls;

use bones\base\control;

class label extends control
{

    private $for;

    public function set_for( $_for )
    {
        $this->for = $_for;
    }

    public function get_for()
    {
        return $this->for;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "for", $this->get_for() );

        return $attributes;
    }
}


