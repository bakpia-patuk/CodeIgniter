
			<div id="disponibilidad">
				<?php 

				$entrada = array(
					'name'  => 'fecha_entrada',
					'id'    => 'date',
					'value' => date('Y-m-d'),
					'type'  => 'date'
		      	);

		        $noches = array(
					'name'  => 'noches',
					'value' => '1',
					'type'	=> 'number',
					'min'	=> '1',		
					'max'	=> '15',
					'style' => 'width:35px'
			    );

		        $habitaciones = array(
					'name'  => 'habitaciones',
					'id'    => 'date',
					'value' => '1',
					'type'  => 'number',
					'min'	=> '1',
					'max'	=> '15'	
			    );
			    $submit = array(
			    	'name' 	=>'disponibilidad',
			    	'value' =>'Disponibilidad',
			    	'class' =>'disponibilidad'
			    	);
	    
	        	echo form_open('index.php/Disponibilidad'); 
				echo form_label('Entrada', 'fecha_entrada');
				echo form_input($entrada);
				echo form_label('Noches','noches');
				echo form_input($noches);
				echo form_label('Habitaciones','habitaciones');
				echo form_input($habitaciones);
				echo form_submit($submit);
				echo form_close();

				?>
			</div>



			<div id="logo3">
		        <div class="slider-wrapper theme-default">
		            <div id="slider" class="nivoSlider">
		                <img src="<?php echo base_url('imagenes/hotel1.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel1.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel2.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel2.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel3.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel3.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel4.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel4.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel5.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel5.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel6.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel6.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel7.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel7.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel8.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel8.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel9.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel9.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel10.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel10.jpg" alt=""/>
		                <img src="<?php echo base_url('imagenes/hotel11.jpg'); ?>" data-thumb="<?php echo base_url(); ?>imagenes/hotel.jpg" alt=""/>
		            </div>
		        </div>
			</div>

		</div>