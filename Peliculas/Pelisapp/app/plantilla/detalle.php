<?php
$ruta = $_SERVER['PHP_SELF']."?orden=Votar&codigo=".$peli->codigo_pelicula."&";
$total="Aún no se ha votado esta película";
if($peli->votos>0)$total=$peli->total_votos/$peli->votos;
ob_start();
?>
<h2> Detalles </h2>
<table>
<tr><td>Código</td><td><?= $peli->codigo_pelicula ?></td></tr>
<tr><td>Nombre</td><td><?= $peli->nombre ?></td></tr>
<tr><td>Director</td><td><?= $peli->director ?></td></tr>
<tr><td>Genero</td><td><?= $peli->genero  ?></td></tr>
<tr><td>Portada</td><td><img src="app/img/<?= $peli->imagen ?>" width="200vw" alt="Cartelera"/></td></tr>
<tr><td>Tráiler</td><td><iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$peli->video?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td></tr>
<tr><td>Media de votos</td><td><?= $total ?></td></tr>
<tr><td>Número de votos</td><td><?= $peli->votos ?></td></tr>
</table>
<table>
    <!--Lo separo para que no le afecte el tamaño de columna de los datos-->
    <tr>
        <!-- Les añado divs para que sean más fáciles de pulsar-->
        <td><a href="<?= $ruta.'voto=1'?>"><div>1</div></a></td></td>
        <td><a href="<?= $ruta.'voto=2'?>"><div>2</div></a></td></td>
        <td><a href="<?= $ruta.'voto=3'?>"><div>3</div></a></td></td>
        <td><a href="<?= $ruta.'voto=4'?>"><div>4</div></a></td></td>
        <td><a href="<?= $ruta.'voto=5'?>"><div>5</div></a></td></td>
        <td><a href="<?= $ruta.'voto=6'?>"><div>6</div></a></td></td>
        <td><a href="<?= $ruta.'voto=7'?>"><div>7</div></a></td></td>
        <td><a href="<?= $ruta.'voto=8'?>"><div>8</div></a></td></td>
        <td><a href="<?= $ruta.'voto=9'?>"><div>9</div></a></td></td>
        <td><a href="<?= $ruta.'voto=10'?>"><div>10</div></a></td></td>
    </tr>
</table>
<input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido

$contenido = ob_get_clean();
include_once "principal.php";

?>