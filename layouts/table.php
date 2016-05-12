<?php
namespace bones\layouts;

use bones\base\layout;
use bones\controls\th;
use bones\controls\span;
use bones\containers\thead;
use bones\containers\tbody;
use bones\containers\tr;
use bones\containers\td;

class table extends layout
{

	public function render( $_container )
	{
		$counter 	= 0; 
		$controls 	= $_container->get_controls();
		$data	 	= $_container->get_data();

		$thead = new thead("thead");
		$tbody = new tbody("tbody");
		$row   = new tr("row");

		foreach ( $controls as $control )
		{
			$th = new th("th");
			$th->set_text( $control->get_label() );
			$row->add( $th );
		}

		$thead->add($row);

		foreach ( $data as $content )
		{
			$counter = 0;
			//$content = array_values( $content );
			$row 	 = new tr("row");

			foreach ( $controls as $control )
			{
				$new_control = clone $control;
				$td 		 = new td("td");

				$new_control->populate($content);

				$td->add( $new_control );
				$row->add( $td );
			}

			$tbody->add($row);
		}

		$thead->render();
		$tbody->render();

	}
}