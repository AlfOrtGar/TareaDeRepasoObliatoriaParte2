<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------

include_once 'config.php';
include_once 'modeloPeliDB.php'; 

/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlPeliInicio(){
    die(" No implementado.");
   }

/*
 *  Muestra y procesa el formulario de alta 
 */

function ctlPeliAlta (){
    $codigo=ModeloPeliDB::UltimoID();
    $codigo++;
    include_once 'plantilla/cambiar.php';
}
/*
 *  Muestra y procesa el formulario de Modificación 
 */
function ctlPeliModificar (){
    $codigo = $_GET['codigo'];
    $peli = ModeloPeliDB::getOne($codigo);
    include_once 'plantilla/cambiar.php';
}

function ctlGuardar(){
    $nuevo=ModeloPeliDB::UltimoID();
    $nuevo++;

    $id=$_GET['codigo'];
    $titulo=$_GET['nombre'];
    $director=$_GET['director'];
    $genero=$_GET['genero'];
    $video=$_GET['video'];

    //Asumo la buena fe de la gente y que lo va a rellenar todo, pero por si acaso
    //Para que no de ningun fallo, añado sentencias que llenan las variables

    if(!$id)$id="Desconocido";
    if(!$titulo)$titulo="Desconocido";
    if(!$director)$director="Desconocido";
    if(!$genero)$genero="Desconocido";
    if(!$video)$video="No se ha aportado ningún trailer";


    if($id==$nuevo){
        ModeloPeliDB::Nuevo($titulo,$director,$genero,$video);
    }
    else{
        ModeloPeliDB::Actualizar($id,$titulo,$director,$genero,$video);
    }
    $peliculas=ModeloPeliDB::GetAll();
    include_once 'plantilla/verpeliculas.php';
}

function ctlBuscar (){
    $filtro = $_GET['filtro'];
    $dato = $_GET['dato'];
    $peliculas = ModeloPeliDB::Buscar($filtro,$dato);
    include_once 'plantilla/verpeliculas.php';
}

/*
 *  Muestra detalles de la pelicula
 */

function ctlPeliDetalles(){
    $codigo = $_GET['codigo'];
    $peli = ModeloPeliDB::getOne($codigo);
    include_once 'plantilla/detalle.php';
}
/*
 * Borrar Peliculas
 */

function ctlPeliBorrar(){
    $codigo=$_GET['codigo'];
    ModeloPeliDB::Borrar($codigo);
    $peliculas=ModeloPeliDB::GetAll();
    include_once 'plantilla/verpeliculas.php';
}

/*
 * Cierra la sesión y vuelca los datos
 */
function ctlPeliCerrar(){
    session_destroy();
    modeloPeliDB::closeDB();
    header('Location:index.php');
}

/*
 * Muestro la tabla con los usuario 
 */ 
function ctlPeliVerPelis (){
    // Obtengo los datos del modelo
    $peliculas = modeloPeliDB::GetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verpeliculas.php';
   
}

function ctlVotar (){
    //Creo una cookie para comprobar que no se vota más de 5 veces al día
    if(!isset($_COOKIE["votacion"])){
        setcookie("votacion",0,time()+86400);
        //Y me guardo cuando expira para actualizarla correctamente, en otra cookie
        setcookie("expiracion",time()+86400,time()+86400);
    }
    else{
        setcookie("votacion",$_COOKIE["votacion"]+1,$_COOKIE["expiracion"]);
    }
    $codigo=$_GET['codigo'];
    $voto=$_GET['voto'];
    if($_COOKIE["votacion"]<5){
        ModeloPeliDB::Votar($codigo,$voto);
    }
    //Hago que vuelva a las pelis en vez de a la misma pagina
    //Para que así no se contabilice el voto de nuevo si se recarga
    $peliculas=ModeloPeliDB::GetAll();
    include_once 'plantilla/verpeliculas.php';
}

function ctlJSON(){
    $peliculas=ModeloPeliDB::GetAll();
    $salida=json_encode($peliculas);
    if($salida==false)alert("Algo ha salido mal");
    header("Content-Type: application/json");
    echo $salida;
    exit();
}