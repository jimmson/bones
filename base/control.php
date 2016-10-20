<?php

namespace bones\base;
 
abstract class control
{
    //Tag types
    const FULL_TAG      = 0;
    const CONTANING_TAG = 1;
    const VOID_TAG      = 2;
    const EMPTY_TAG     = 3;

    //renderer
    const DEFAULT_RENDERER = "render_control";

    private static $indentation_level = 0;

    private $id;
    private $name;
    private $label;
    private $text;
    private $class  = array();
    private $styles = array();
    private $custom_attributes = array();
    private $renderer;
    private $element;
    private $named = false;
    private $tag   = self::FULL_TAG;
    private $populate_method = "set_text";

    private $data_items      = array();
    private $data_properties = array();

    public function __construct( $_name = "")
    {
        $ReflectionClass = new \ReflectionClass($this);

        $this->name = $_name;
        $this->set_element($ReflectionClass->getShortName());
    	$this->set_renderer(self::DEFAULT_RENDERER);
    }

    public function get_element()
    {
        return $this->element;
    }

    public function set_element( $_element )
    {
        $this->element = $_element;
    }

    public function get_name()
    {
    	return $this->name;
    }

    public function set_id( $_id )
    {
    	$this->id = $_id;
    }

    public function get_label()
    {
        return $this->label;
    }

    public function set_label( $_label )
    {
        $this->label = $_label;
    }

	public function get_id()
	{
		return $this->id;	
	}

    public function set_text( $_text )
    {
    	$this->text = $_text;
    }

	public function get_text()
	{
		return $this->text;	
	}

    public function get_populate_method()
    {
        return $this->populate_method;
    }

    public function set_populate_method( $_populate_method )
    {
        $this->populate_method = $_populate_method;
    }

    public function set_custom_attribute( $_attribute, $_value )
    {
        $this->custom_attributes[ $_attribute ] = $_value;
    }

    public function get_custom_attribute( $_attribute )
    {
        return $this->custom_attributes[ $_attribute ]; 
    }

    public function get_custom_attributes()
    {
        $custom_attributes = "";

        foreach( $this->custom_attributes as $key => $value )
        {
            $custom_attributes .= self::get_attribute( $key, $value);
        }

        return $custom_attributes;
    }

    public function set_style( $_attribute, $_value )
    {
        $this->styles[ $_attribute ] = $_value;
    }

    public function get_style( $_attribute )
    {
        return $this->styles[ $_attribute ]; 
    }

    public function get_styles()
    {
        $styles = "";

        foreach( $this->styles as $key => $value )
        {
            $styles .= $key . " : " . $value . ";";
        }

        return self::get_attribute("style", $styles);
    }

    public function set_data_items( ...$_data_items )
    {
         $this->data_items = array_merge( $this->data_items, $_data_items );
    }

    public function has_data_items()
    {
         return !empty( $this->data_items );
    }

    public function set_data_properties( ...$_data_properties )
    {
         $this->data_properties = array_merge( $this->data_properties, $_data_properties );
    }

	public function set_class( ...$_class )
	{
		 $this->class = array_merge( $this->class, $_class );
	}

    public function build_class()
    {
        return implode( " ", $this->class );
    }

    public function get_tag()
    {
        return $this->tag;
    }

    public function set_tag( $_tag )
    {
        $this->tag = $_tag;
    }

    public function get_named()
    {
        return $this->named;
    }

    public function set_named( $_named )
    {
        $this->named = $_named;
    }

    public function get_renderer()
    {
        return $this->renderer;
    }

    public function set_renderer( $_renderer )
    {
        $this->renderer = $_renderer;
    }

    private static function get_white_space()
    {    
        return "\n" . str_repeat( "\t", self::$indentation_level );
    }

    protected static function get_attribute( $_attribute, $_value )
    {
        if ( $_value != "" )
        {
            return " " . $_attribute . '="' . $_value . '"';
        }
        else 
            return '';
    }

    protected function build_attributes()
    {
        $attributes  = self::get_attribute( "class", $this->build_class());
        $attributes .= self::get_attribute( "id",    $this->get_id());
        $attributes .= $this->get_custom_attributes();
        $attributes .= $this->get_styles();

        if ( $this->get_named() )
        {
            $attributes .= self::get_attribute( "name",  $this->get_name());
        }

        return $attributes;
    }

    public function get_opening_tag()
    {
        $opening_tag  = self::get_white_space() . "<"; 
        $opening_tag .= $this->get_element();
        $opening_tag .= $this->build_attributes();

        if ( $this->tag != self::VOID_TAG )
        {
            $opening_tag .= ">";
        }

        self::$indentation_level++;

        echo $opening_tag;
    }
    
    public function get_closing_tag()
    {
        self::$indentation_level--;

        switch ( $this->tag ) 
        {
            case self::VOID_TAG:
                echo "/>";
                break;
            case self::CONTANING_TAG:
                echo self::get_white_space();
            case self::FULL_TAG:
                echo "</" . $this->get_element() . ">";
                break;
            case self::EMPTY_TAG:
                echo "";
                break;
        }
    } 

    public function get_body()
    {
        if ( $this->get_tag() == self::FULL_TAG || $this->get_tag() == self::CONTANING_TAG ) 
        {
            echo $this->get_text();
        }
    }

    public function render_control()
    {
        $this->get_opening_tag();

        $this->get_body();

        $this->get_closing_tag();
    }
    
    public function render()
    {
        $renderer = $this->get_renderer();

        $this->$renderer();
    }

    public function populate( $_data )
    {
        foreach( $this->data_items as $key => $item )
        {
            $value  = $_data[ $item ];
            $method = $this->data_properties[ $key ];

            $this->$method( $value );           
        }   
    }
 }


