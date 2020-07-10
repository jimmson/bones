<?php
namespace bones\containers;

use bones\base\container;
use bones\layouts\select as select_layout;

class select extends container
{
    private $value;
    private $data = array();

    public function __construct($_name)
    {
        parent::__construct($_name);

        $layout = new select_layout();

        $this->set_layout($layout);
        $this->set_named(true);
    }

    public function set_value($_value)
    {
        $this->value = $_value;
    }

    public function get_value()
    {
        return $this->value;
    }

    public function set_data($_data)
    {
        $this->data = $_data;
    }

    public function get_data()
    {
        return $this->data;
    }
}
