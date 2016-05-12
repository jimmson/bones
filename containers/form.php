<?php
namespace bones\containers;

use bones\base\container;

class form extends container
{
    // Request methods
    const GET 	= "GET";
    const POST 	= "POST";

    private $action;
    private $method;
    private $enctype;

    public function __construct( $_name = "", $_method = self::GET, $_action = "" )
    {
        parent::__construct( $_name );

        $this->action   = $_action;
        $this->method   = $_method;
        $this->enctype  = "multipart/form-data";
    }

    public function get_action()
    {
        return $this->action;
    }

    public function set_action( $_action )
    {
        $this->action = $_action;
    }

    public function get_method()
    {
        return $this->method;
    }

    public function set_method( $_method )
    {
        $this->method = $_method;
    }

    public function get_enctype()
    {
        return $this->enctype;
    }

    public function set_enctype( $_enctype )
    {
        $this->enctype = $_enctype;
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "action",  $this->get_action() );
        $attributes .= self::get_attribute( "method",  $this->get_method() );
        $attributes .= self::get_attribute( "enctype", $this->get_enctype() );

        return $attributes;
    }

}


