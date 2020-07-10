<?php
namespace bones\controls;

use bones\base\control;

class link extends control
{

    // rels
    const STYLESHEET  = "stylesheet";

    private $rel;
    private $href;

    public function __construct($_name, $_rel = self::STYLESHEET)
    {
        parent::__construct($_name);

        $this->rel  = $_rel;
        $this->set_tag(control::EMPTY_TAG);
    }

    public function set_rel($_rel)
    {
        $this->rel = $_rel;
    }

    public function get_rel()
    {
        return $this->rel;
    }

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
        $attributes .= self::get_attribute("rel", $this->get_rel());
        $attributes .= self::get_attribute("href", $this->get_href());

        return $attributes;
    }
}
