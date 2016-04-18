<?php
namespace bones\containers;

use bones\base\container;
use bones\layouts\table as table_layout;

class table extends container
{

    private $data = array();

    public function __construct( $_title )
    {
        parent::__construct( $_title );

        $layout = new table_layout();

        $this->set_layout( $layout );
    }

    public function set_data( $_data )
    {
        $this->data = $_data;
    }

    public function get_data()
    {
        return $this->data;
    }
}


