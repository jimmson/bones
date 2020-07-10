<?php

namespace bones\base;

class layout
{
    public function __construct()
    {
    }

    public function render($_container)
    {
        $controls = $_container->get_controls();

        foreach ($controls as $control) {
            $control->render();
        }
    }
}
