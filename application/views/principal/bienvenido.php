<div id="contenido">
        <?php 
        $col = array('columna_derecha','columna_izquierda');
        $i=0;
        foreach ($historia as $key => $value) {
            echo "<div class='".$col[$i]."'>";
            echo "<h2>".$value['titulo']."</h2>";
            echo "<p>".$value['contenido']."</p>";
            echo "<img id='fotoPortada' src='".base_url()."/imagenes/".$value['foto']."' />";
            echo "</div>";
            $i++;
            if ($i > 2) $i = 0;
        }
        ?>	            
</div>

