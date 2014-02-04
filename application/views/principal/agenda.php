<div id="contenido">
	<h1>Agenda Dubai</h1>
	<?php
		echo "<ul>";
		foreach ($tipoEvento as $key => $value) {
			echo "<li>".$value['nombre']."</li>";
		}
		echo "</ul>";
    ?>
</div>