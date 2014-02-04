 <body id="cuerpo">

	<div id="fondo1"></div>
	<div id="fondo2"></div>
	<div id="fondo3"></div>

	<div id="web">

		<div id="header">

			<div id="logos">
				
				<div id="logo1">
					<img src="<?php echo base_url('imagenes/logo.png'); ?>"/>
				</div>	

			</div>
			<div id="logo2">

							<?php 

							$nick = array(
								'name'  => 'nick',
								'type'  => 'text',
								'placeholder' => 'nick',
								'maxlength' => '30',
								'class' => 'input'
					      	);

					        $password = array(
								'name'  => 'password',
								'type'	=> 'password',
								'placeholder' => 'Password',
								'size' => '30',
								'maxlength' => '30',
								'class' => 'input'
						    );
						    $submit = array(
						    	'name' 	=>'loginsub',
						    	'value' =>'Login',
						    	'class' =>'input'
						    );
				    
				        	echo form_open('index.php/Login'); 
							echo form_label('Nick', 'nick');
							echo form_input($nick);
							echo form_label('Password','password');
							echo form_input($password);
							echo form_submit($submit);
							echo form_close();
							?>

			</div>