<?php
//Esta declaracion la añado para que no me salte un warning al concatenar si no esta modificando
$contenido="";
if($_GET['orden']=="Modificar"){
    ob_start();
    ?>
    <h2> Datos actuales </h2>
    <table>
    <tr><td>Código</td><td><?= $peli->codigo_pelicula ?></td></tr>
    <tr><td>Nombre</td><td><?= $peli->nombre ?></td></tr>
    <tr><td>Director</td><td><?= $peli->director ?></td></tr>
    <tr><td>Genero</td><td><?= $peli->genero  ?></td></tr>
    <tr><td>Portada</td><td><img src="app/img/<?= $peli->imagen ?>" width="200vw" alt="Cartelera"/></td></tr>
    </table>
    
    <?php 
    // Vacio el bufer y lo copio a contenido
    // Para que se muestre en div de contenido

    $contenido = ob_get_clean();
}?>
<?php
ob_start();
?>
<h2>Nuevos datos</h2>
<form action='index.php'>
    <label>Titulo</label><input type='text' name='nombre'>
    <label>Director</label><input type='text' name='director'>
    <label>Género</label><input type='text' name='genero'>
    <label>Tráiler</label><input type='text' name="video">
    <input type='hidden' name='codigo' value='<?= $codigo ?>'>
    <input type='hidden' name='orden' value='Guardar'>
    <input type='submit' value="Guardar cambios">
    <input type="button" value=" Volver " size="10" onclick="javascript:window.location='index.php'" >
</form>
<?php
$contenido.=ob_get_clean();
include_once "principal.php";
?>