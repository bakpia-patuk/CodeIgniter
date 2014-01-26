<body>
	
	<div id="web">

		<div id="header">

			<div id="logos">
				
				<div id="logo1">
					<img src="<?php echo base_url(); ?>imagenes/logo.png"/>
				</div>	

				<div id="mensajeLogin">
					<?php
						#include_once 'login.php';
						#$loginSystem= new LoginSystem();
						#$loginSystem->showMessage();
					?>
				</div>

				<div id="logo2">
					<form action="loginForm.php" method="post">
						<input name="Submit" type="submit" value="Signin" class="boton"/>
						<input name="Username" type="text" placeholder="ID Empleado" size="30" maxlength="30" class="inpt"/></br>
						<input name="Submit2" type="submit" value="Login" class="boton"/>
						<input name="Password" type="password" placeholder="Password" size="30" maxlength="30" class="inpt"/>
					</form>
				</div>

			</div>

			<div id="disponibilidad">
				<form action="" method="POST">
					<a>Entrada:</a><input id="date" type="date" value="<?php echo date('Y-m-d'); ?>" name="fecha_entrada"/>
					<a>Noches:</a><input type="number" value="1" name="noches" min="1" max="15"/>
					<a>Habitaciones:</a><input type="number" value="1" name="habitaciones" min="1" max="5"/>
					<input type="submit" name="disponibilidad" class="disponibilidad" value="DISPONIBILIDAD"/>
				</form>
			</div>

			<div id="logo3">
		        <div class="slider-wrapper theme-default">
		            <div id="slider" class="nivoSlider">
		                <img src="<?php echo base_url(); ?>imagenes/hotel9.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel9.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel1.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel1.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel2.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel2.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel3.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel3.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel4.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel4.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel5.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel5.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel6.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel6.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel7.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel7.png" alt=""/>
		                <img src="<?php echo base_url(); ?>imagenes/hotel8.png" data-thumb="<?php echo base_url(); ?>imagenes/hotel8.png" alt=""/>
		            </div>
		        </div>
			</div>

		</div>