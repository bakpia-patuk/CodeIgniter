<div>
	<?php

	$fecha_entrada=$this->session->userdata('fecha_entrada');

	if($fecha_entrada>=date('Y-m-d')){
		if(!$hab_disponibles){
			echo 'No hay habitaciones disponibles';
		}
		else{
			foreach ($hab_disponibles as $hab) {
				echo  $hab['CODIGO'].' - '. $hab['TIPO HAB.'].' - '.  $hab['descripcion'].' - '.$hab['DISPONIBLES']. '<br>';
			}
		}
	}
	else{
		echo "Fecha anterior al día de hoy.";
	}
	?>
</div>