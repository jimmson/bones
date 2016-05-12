<?php
namespace bones\layouts;

use bones\base\layout;
use bones\controls\option;

class select extends layout
{
	public function render( $_container )
	{
		$controls 	  = $_container->get_controls();
		$data	 	  = $_container->get_data();

		foreach ( $controls as $control )
		{
			if ( $control->has_data_items() )
			{
				foreach ( $data as $content )
				{
					$new_control = clone $control;
					$new_control->populate($content);

					if ($new_control->get_value() == $_container->get_value())
					{
						$new_control->set_selected(option::SELECTED);
					}

					$new_control->render();
				}
			}	
			else
			{
				$control->render();
			}	
		}
	}
}