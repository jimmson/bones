<?php

namespace bones\base;

abstract class container extends control
{
	private $controls = array();
	private $layout;

	public function __construct( $_name = "")
	{
		parent::__construct( $_name );

		$this->layout 	= new layout();
		$this->set_tag( control::CONTANING_TAG  );
        $this->set_named( false );
    }

	public function add( ...$_control )
	{
		$this->controls = array_merge( $this->controls, $_control );
	} 

	public function get_controls()
	{
		return $this->controls;
	} 

	public function has_controls()
	{
		return !empty($this->controls);
	}

	public function get_control( $_name )
	{
		foreach ( $this->controls as $control )
		{
			if ( $control->get_name() == $_name ) 
			{
				return $control;
			}
		}

		return null;
	}

	public function populate_controls( $_values )
	{
		foreach ( $_values as $key => $value )
		{
			$control = $this->get_control( $key );

			if ( !$control ) continue;

			$method = $control->get_populate_method();

			if ( method_exists( $control, $method ) )
			{
				$control->$method( $value );	
			}	
		}
	}

	public function set_control_properties( $_property_method, $_value )
	{
		$controls = $this->get_controls();

		foreach ( $controls as $control )
		{
			if ( method_exists( $control, $_property_method ) )
			{
				$control->$_property_method( $_value );	
			}	
		}
	}

	public function set_layout( $_layout )
	{
		$this->layout = $_layout;
	} 

	public function get_body()
	{
        parent::get_body();

        /*if ( $this->has_controls() ) 
        {*/
            $this->layout->render( $this );
      /*  }*/
    }	
}