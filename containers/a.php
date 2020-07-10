<?php
namespace bones\containers;

use bones\base\container;

class a extends container
{
    protected $href;

    public function set_href($_href)
    {
        $this->href = $_href;
    }

    public function get_href()
    {
        return $this->href;
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute("href", $this->get_href());

        return $attributes;
    }
}
