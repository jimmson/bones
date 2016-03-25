<?php
 namespace bones\controls;

 use bones\base\control;
 
 class h extends control
 {

    public function __construct( $_name, $_importance = 1)
    {
        parent::__construct( $_name );

        $this->set_element("h" . $_importance);
        $this->set_named( false );
    }

 }


