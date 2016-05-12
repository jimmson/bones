<?php
namespace bones\controls;

use bones\base\control;

class textarea extends control
{

 	private $cols;
 	private $rows;
 	private $value;

	public function __construct( $_name, $_cols = "", $_rows = "" )
    {
        parent::__construct( $_name );

        $this->cols  = $_cols;
        $this->rows  = $_rows;

        $this->set_named( true );
    }

    public function set_value( $_value )
    {
        $this->value = $_value;
    }

    public function get_value()
    {
        return $this->value;    
    }

	public function set_cols( $_cols )
    {
        $this->cols = $_cols;
    }

    public function get_cols()
    {
        return $this->cols;    
    }

	public function set_rows( $_rows )
    {
        $this->rows = $_rows;
    }

    public function get_rows()
    {
        return $this->rows;    
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute( "rows", $this->get_rows() );
        $attributes .= self::get_attribute( "cols", $this->get_cols() );

        return $attributes;
    }

}


