<?php
namespace bones\controls;

use bones\base\control;

class script extends control
{
    // types
    const JAVASCRIPT = "text/javascript";

    private $type;
    private $src;

    public function __construct( $_name = "", $_type = self::JAVASCRIPT )
    {
        parent::__construct( $_name );

        $this->type = $_type;
        $this->set_tag( control::FULL_TAG );
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type( $_type )
    {
        $this->type = $_type;
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
        $attributes .= self::get_attribute( "type", $this->get_type() );
        $attributes .= self::get_attribute( "src",  $this->get_src() );

        return $attributes;
    }

}


