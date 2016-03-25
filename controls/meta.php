<?php
 namespace bones\controls;

 use bones\base\control;
 
 class meta extends control
 {

    private $content;

    public function __construct( $_name )
    {
        parent::__construct( $_name );

        $this->set_tag( control::EMPTY_TAG );
    }

    public function set_content( $_content )
    {
        $this->content = $_content;
    }
 
    public function get_content()
    {
        return $this->content;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "content",  $this->get_content() );

        return $attributes;
    }

 }


