<?php
 namespace bones\base;

 use bones\base\container;
 use bones\controls\title;
 use bones\controls\link;
 use bones\controls\meta;
 use bones\controls\script;
 use bones\containers\head;
 use bones\containers\body;

class page extends container
{
	private $title;
	private $meta;
	private $links;
	private $scripts;
	private $head;
	private $body;

	public function __construct( $_title )
	{
		parent::__construct("name");

		$this->links 	= [];
		$this->meta  	= [];
		$this->scripts  = [];
		$this->head  	= new head("head");
		$this->body  	= new body("body");

		$this->set_element("html");

		$this->title = new title("title");
		$this->title->set_text( $_title );
	}

	public function add( ...$_control )
	{
		$this->body->add( ...$_control );
	} 

	public function add_script( $_src )
	{
		$script = new script("script");
		$script->set_src( $_src );

		array_push( $this->scripts, $script );
	}

	public function add_stylesheet( $_href )
	{
		$link = new link("link");
		$link->set_href( $_href );

		array_push( $this->links, $link );
	}

	public function add_meta( $_name, $_content )
	{
		$meta = new meta( $_name );
		$meta->set_content( $_content );

		array_push( $this->meta, $meta );
	}

	public function get_head()
	{
		$this->head->add( $this->title );
		$this->head->add( ...$this->meta );
		$this->head->add( ...$this->links );
		$this->head->add( ...$this->scripts );
	}

		public function get_body()
		{
			$this->get_head();
			$this->head->render();
			$this->body->render();
			
		}

}