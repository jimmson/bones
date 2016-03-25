<?php
 namespace bones\controls;

 use bones\base\control;
 
 class link extends control
 {

    // rels
    const STYLESHEET  = "stylesheet";

    // types
    const CSS = "css";

    private $type;
    private $rel;
    private $src;

    public function __construct( $_name, $_type = self::CSS, $_rel = self::STYLESHEET )
    {
        parent::__construct( $_name );

        $this->type = $_type;
        $this->rel  = $_rel;
        $this->set_tag( control::EMPTY_TAG );
        $this->set_named( false );
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type( $_type )
    {
        $this->type = $_type;
    }

    public function set_rel( $_rel )
    {
        $this->rel = $_rel;
    }
 
    public function get_rel()
    {
        return $this->rel;    
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
        $attributes .= self::get_attribute( "rel",  $this->get_rel() );
        $attributes .= self::get_attribute( "src",  $this->get_src() );

        return $attributes;
    }

 }


