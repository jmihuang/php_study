 <?php
function getData($loc){
	switch ($loc){
		case 'taipe':
		   $hfdata['taipei']= "http://www.gov.taipei/";

		break;
	}

	return $hfdata;
}

 

    var_dump( getData('taipe')['taipei'] );
 ?>

