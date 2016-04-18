<?php
namespace bones\controls;

use bones\base\control;

class a extends control
{
    protected $href;

    public function __construct( $_name )
    {
        parent::__construct( $_name );

        $this->set_tag( control::FULL_TAG );
        $this->set_named( false );
    }

    public function set_href( $_href )
    {
        $this->href = $_href;
    }

    public function get_href()
    {
        return $this->href;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "href", $this->get_href() );

        return $attributes;
    }

}


