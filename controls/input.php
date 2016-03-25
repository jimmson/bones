<?php
 namespace bones\controls;

 use bones\base\control;
 
 class input extends control
 {

    const TEXT     = "text";
    const PASSWORD = "password";

    private $type;
    private $value;
    private $placeholder;

    public function __construct( $_name, $_type = self::TEXT  )
    {
        parent::__construct( $_name );

        $this->type = $_type;
        $this->set_tag( control::VOID_TAG );
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type( $_type )
    {
        $this->type = $_type;
    }

    public function set_value( $_value )
    {
        $this->value = $_value;
    }
 
    public function get_value()
    {
        return $this->value;    
    }

    public function set_placeholder( $_placeholder )
    {
        $this->placeholder = $_placeholder;
    }
 
    public function get_placeholder()
    {
        return $this->placeholder;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "type",         $this->get_type() );
        $attributes .= self::get_attribute( "value",        $this->get_value() );
        $attributes .= self::get_attribute( "placeholder",  $this->get_placeholder() );

        return $attributes;
    }

 }


