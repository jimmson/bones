<?php
 namespace bones\base;
 
 abstract class control
 {
    //Tag types
    const FULL_TAG      = 0;
    const CONTANING_TAG = 1;
    const VOID_TAG      = 2;
    const EMPTY_TAG     = 3;

    private static $indentation_level = 0;

	private $id;
	private $name;
	private $text;
	private $class;
    private $element;
    private $named = true;
    private $tag   = self::FULL_TAG;

	public function __construct( $_name )
	{
        $ReflectionClass = new \ReflectionClass($this);

        $this->element   = $ReflectionClass->getShortName();
		$this->name      = $_name;
		$this->class 	 = [];
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

        return $opening_tag;
    }
    
    public function get_closing_tag()
    {
        self::$indentation_level--;

        switch ( $this->tag ) 
        {
            case self::VOID_TAG:
                return "/>";
                break;
            case self::FULL_TAG:
                return "</" . $this->get_element() . ">";
            case self::CONTANING_TAG:
                return self::get_white_space() . "</" . $this->get_element() . ">";
                break;
            case self::EMPTY_TAG:
                return "";
                break;
        }
    } 

    public function get_body()
    {
        if ( $this->tag == self::FULL_TAG ) 
        {
            return $this->get_text();
        }
    }

    public function render()
    {
        echo $this->get_opening_tag();

        echo $this->get_body();

        echo $this->get_closing_tag();
    }
 }


