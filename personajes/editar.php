<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


<?php
  require_once("../bd.php");

  if (isset($_GET["txtID"])) {
    //Recolectar los datos del metodo GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    //Preparar edición de los datos

 

$sentencia = $conexion->prepare("SELECT * FROM `personajes` WHERE id=:id");
$sentencia->bindValue(":id",$txtID);
$sentencia->execute();
$registro = $sentencia->fetch(PDO::FETCH_LAZY);
$nombrePersonaje = $registro['nombre'];
$imagenPersonaje = $registro['imagen'];
$vidaPersonaje = $registro['vida'];
$ataque1Personaje = $registro['ataque1'];
$ataque2Personaje = $registro['ataque2'];
$ataque3Personaje = $registro['ataque3'];
$ataque4Personaje = $registro['ataque4'];
}















if($_POST){  
    //Recolectar datos del metodo post
    $nombrePersonaje = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $imagenPersonaje = isset($_POST["imagen"]) ? $_POST["imagen"] : "";
    $vidaPersonaje = isset($_POST["vida"]) ? $_POST["vida"] : "";
    $ataque1Personaje = isset($_POST["ataque1"]) ? $_POST["ataque1"] : "";
    $ataque2Personaje = isset($_POST["ataque2"]) ? $_POST["ataque2"] : "";
    $ataque3Personaje = isset($_POST["ataque3"]) ? $_POST["ataque3"] : "";
    $ataque4Personaje = isset($_POST["ataque4"]) ? $_POST["ataque4"] : "";
  
  
    $sentencia = $conexion->prepare(
        "UPDATE 
        `personajes` 
    SET 
        `nombre`=:nombre,
        `imagen`=:imagen,
        `vida`=:vida,
        `ataque1`=:ataque1,
        `ataque2`=:ataque2,
        `ataque3`=:ataque3,
        `ataque4`=:ataque4 
    WHERE id=:id");
   
   $sentencia->bindValue(":id", $txtID);
   $sentencia->bindValue(":nombre", $nombrePersonaje);
   $sentencia->bindValue(":imagen", $imagenPersonaje);
   $sentencia->bindValue(":vida", $vidaPersonaje);
   $sentencia->bindValue(":ataque1", $ataque1Personaje);
   $sentencia->bindValue(":ataque2", $ataque2Personaje);
   $sentencia->bindValue(":ataque3", $ataque3Personaje);
   $sentencia->bindValue(":ataque4", $ataque4Personaje);
   $sentencia->execute();
  
   header("Location: index.php");
  }

  
















?>


<main class="container">
<div class="card-header">
  <br>
        <h1>Edición de personajes</h1>
  <br> 
  <br>     
    </div>   
    <div class="card-body">
        <form action="" method="post" enctype=multipart/form-data>
        <div class="mb-3">

        <label for="txtID" class="form-label"></label>
          <input type="hidden" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="" value="<?php echo $txtID;?>" >

          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="<?php echo $nombrePersonaje;?>" >

          <br>
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="" value="<?php echo $imagenPersonaje;?>">

          <br>
          <label for="vida" class="form-label">Vida</label>
          <input type="text" class="form-control" name="vida" id="vida" aria-describedby="helpId" placeholder="" value="<?php echo $vidaPersonaje;?>">

          <br>
          <label for="ataque1" class="form-label">Ataque 1</label>
          <input type="text" class="form-control" name="ataque1" id="ataque1" aria-describedby="helpId" placeholder="" value="<?php echo $ataque1Personaje;?>">

          <br>
          <label for="ataque2" class="form-label">Ataque 2</label>
          <input type="text" class="form-control" name="ataque2" id="ataque2" aria-describedby="helpId" placeholder="" value="<?php echo $ataque2Personaje;?>">

          <br>
          <label for="ataque3" class="form-label">Ataque 3</label>
          <input type="text" class="form-control" name="ataque3" id="ataque3" aria-describedby="helpId" placeholder="" value="<?php echo $ataque3Personaje;?>">

          <br>
          <label for="ataque4" class="form-label">Ataque 4</label>
          <input type="text" class="form-control" name="ataque4" id="ataque4" aria-describedby="helpId" placeholder="" value="<?php echo $ataque4Personaje;?>"> 

        </div>
        <button type="submit" name="" id="" class="btn btn-primary" href="#" role="button">Agregar registro</button>
        <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
        </form>
</div>
</div>