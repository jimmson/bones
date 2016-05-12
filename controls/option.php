<?php
namespace bones\controls;

use bones\base\control;

class option extends control
{

    const SELECTED = "selected";

    private $value;
    private $selected;

    public function set_value( $_value )
    {
        $this->value = $_value;
    }

    public function get_value()
    {
        return $this->value;    
    }

    public function set_selected( $_selected )
    {
        $this->selected = $_selected;
    }

    public function get_selected()
    {
        return $this->selected;    
    }   


    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "value",        $this->get_value() );
        $attributes .= self::get_attribute( "selected",     $this->get_selected() );

        return $attributes;
    }
}


