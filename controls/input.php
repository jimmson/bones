<?php
namespace bones\controls;

use bones\base\control;

class input extends control
{
    const TEXT     = "text";
    const PASSWORD = "password";
    const FILE     = "file";

    private $type;
    private $value;
    private $placeholder;
    private $readonly   = false;
    private $disabled   = false;
    private $hidden     = false;
    private $multiple   = false;

    public function __construct($_name, $_type = self::TEXT)
    {
        parent::__construct($_name);

        $this->type = $_type;
        $this->set_tag(control::VOID_TAG);
        $this->set_named(true);
        $this->set_populate_method("set_value");
    }

    public function get_type()
    {
        return $this->type;
    }

    public function set_type($_type)
    {
        $this->type = $_type;
    }

    public function set_value($_value)
    {
        $this->value = $_value;
    }

    public function get_value()
    {
        return $this->value;
    }

    public function get_readonly()
    {
        return $this->readonly;
    }

    public function set_readonly($_readonly)
    {
        $this->readonly = $_readonly;
    }

    public function get_multiple()
    {
        return $this->multiple;
    }

    public function set_multiple($_multiple)
    {
        $this->multiple = $_multiple;
    }

    public function set_disabled($_disabled)
    {
        $this->disabled = $_disabled;
    }

    public function get_disabled()
    {
        return $this->disabled;
    }

    public function set_hidden($_hidden)
    {
        $this->hidden = $_hidden;
    }

    public function get_hidden()
    {
        return $this->hidden;
    }

    public function set_placeholder($_placeholder)
    {
        $this->placeholder = $_placeholder;
    }

    public function get_placeholder()
    {
        return $this->placeholder;
    }

    protected function build_attributes()
    {
        $attributes  = parent::build_attributes();
        $attributes .= self::get_attribute("type", $this->get_type());
        $attributes .= self::get_attribute("value", $this->get_value());
        $attributes .= self::get_attribute("placeholder", $this->get_placeholder());

        $attributes .= ($this->readonly ? " readonly " : "");
        $attributes .= ($this->disabled ? " disabled " : "");
        $attributes .= ($this->hidden   ? " hidden "   : "");
        $attributes .= ($this->multiple ? " multiple " : "");

        return $attributes;
    }
}
