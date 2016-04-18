<?php
namespace bones\controls;

use bones\base\control;

class img extends control
{
    private $src;

    public function __construct( $_name )
    {
        parent::__construct( $_name );

        $this->set_tag( control::VOID_TAG );
        $this->set_named( false );
    }

    public function set_src( $_src )
    {
        $this->src = $_src;
    }

    public function get_src()
    {
        return $this->src;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "src",  $this->get_src() );

        return $attributes;
    }

}


