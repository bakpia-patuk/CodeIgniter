<div id="contenido">
	<?php
	//Almacenamos la fecha en una session
	$fecha_entrada=$this->session->userdata('fecha_entrada');
	$i=1;
	//Abrimos un formulario
	echo form_open('index.php/Disponibilidad'); 

	//Si la fecha introducida es de hoy en adelante no hagas nada
	if($fecha_entrada>=date('Y-m-d')){
		//Hay habitaciones disponibles o no
		if(!$hab_disponibles){
			echo 'No hay habitaciones disponibles';
		}
		else{
			echo "<center>";
			echo '<table width="70%">';
				echo '<tr class="titulo"><td>TIPO DE HABITACION</td><td colspan="3">DESCRIPCION</td><td>DISPONIBLES</td></tr>';
				//Recorremos el array con las habitaciones disponibles por tipo
			foreach ($hab_disponibles as $hab) {
				echo '<tr><td align="center"><br><img id="imagen'.$i.'" src="'.base_url("imagenes/foto$i.png").'"/></td><td colspan="3">'.$hab['descripcion'].'</td><td align="center">';

					//Numeramos esas habitaciones
					foreach ($hab_disponibles2 as $num) {
						if($num['cod_tipo'] == $hab['CODIGO']){
							$habitacion[$num['num_hab']]=$num['num_hab'];
						}
					}
					$atrib='id="habitacionElegida"';
					echo form_multiselect('numero',$habitacion,'',$atrib);
					unset($habitacion);


				echo '</td></tr>';
				$i++;
			}

	        	//Tipo de pension
			echo '<tr><td colspan="5"><br></td></tr><tr><td></td>';

				echo '<td align="center">';
				echo form_label('Media Pension');
				echo '</td>';
				echo '<td align="center">';
				echo form_label('Pension Completa');
				echo '</td>';
				echo '<td align="center">';
				echo form_label('Todo incluido');
				echo '</td>';
				

			echo '<td></td></tr><tr><td></td>';

				echo '<td align="center">';
				echo form_radio('pension',1);
				echo '</td>';
				
				echo '<td align="center">';
				echo form_radio('pension',2);
				echo '</td>';
				
				echo '<td align="center">';
				echo form_radio('pension',3);
				echo '</td>';
							

			echo '<td></td></tr>';
			echo '<tr><td colspan="5"><br></td></tr>';

			//Mostramos los servicios disponibles

			echo '<tr><td>Servicios adicionales</td>';
			echo '<td align="center">';
				$servicio[0]='Seleccione...';
				foreach ($servicios as $serv) {
					$servicio[$serv['cod_servicio']]=$serv['nombre'];
				}

				$atrib ='onChange="cargarServicio(this.value);"';
				echo form_dropdown('servicios',$servicio,'',$atrib);

			echo '</td>';

			echo '<td align="center" id="cargarServicio">';
			echo '</td>';
			echo '<td colspan="2" align="center" id="cargarServicio2">';
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo "</center>";
			echo form_close();
				

		}
	}
	else{
		echo "Inserta una fecha factible, Gracias y perdonen las molestias.";
	}
	?>
</div>