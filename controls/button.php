<?php
 namespace bones\controls;

 use bones\base\control;
 
 class button extends control
 {

    const SUBMIT   = "submit";

    private $type;

    public function __construct( $_name, $_type = self::SUBMIT  )
    {
        parent::__construct( $_name );

        $this->type = $_type;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type( $_type )
    {
        $this->type = $_type;
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "type",         $this->get_type() );

        return $attributes;
    }

 }


