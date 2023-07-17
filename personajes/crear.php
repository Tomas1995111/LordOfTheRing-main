<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


<?php

if($_POST){
  require_once("../bd.php");

  //Recolectar datos del metodo post
  $nombrePersonaje = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
  $imagenPersonaje = isset($_POST["imagen"]) ? $_POST["imagen"] : "";
  $vidaPersonaje = isset($_POST["vida"]) ? $_POST["vida"] : "";
  $ataque1Personaje = isset($_POST["ataque1"]) ? $_POST["ataque1"] : "";
  $ataque2Personaje = isset($_POST["ataque2"]) ? $_POST["ataque2"] : "";
  $ataque3Personaje = isset($_POST["ataque3"]) ? $_POST["ataque3"] : "";
  $ataque4Personaje = isset($_POST["ataque4"]) ? $_POST["ataque4"] : "";


  $sentencia = $conexion->prepare("INSERT INTO `personajes`(`id`, `nombre`, `imagen`, `vida`, `ataque1`, `ataque2`, `ataque3`, `ataque4`) 
  VALUES (null, :nombre, :imagen, :vida, :ataque1, :ataque2, :ataque3, :ataque4)");
 
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
        <h1>Datos del personaje</h1>
  <br> 
  <br>     
    </div>   
    <div class="card-body">
        <form action="" method="post" enctype=multipart/form-data>
        <div class="mb-3">

          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">

          <br>
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">

          <br>
          <label for="vida" class="form-label">Vida</label>
          <input type="text" class="form-control" name="vida" id="vida" aria-describedby="helpId" placeholder="">

          <br>
          <label for="ataque1" class="form-label">Ataque 1</label>
          <input type="text" class="form-control" name="ataque1" id="ataque1" aria-describedby="helpId" placeholder="">

          <br>
          <label for="ataque2" class="form-label">Ataque 2</label>
          <input type="text" class="form-control" name="ataque2" id="ataque2" aria-describedby="helpId" placeholder="">

          <br>
          <label for="ataque3" class="form-label">Ataque 3</label>
          <input type="text" class="form-control" name="ataque3" id="ataque3" aria-describedby="helpId" placeholder="">

          <br>
          <label for="ataque4" class="form-label">Ataque 4</label>
          <input type="text" class="form-control" name="ataque4" id="ataque4" aria-describedby="helpId" placeholder="">

        </div>
        <button type="submit" name="" id="" class="btn btn-primary" href="#" role="button">Agregar registro</button>
        <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
        </form>
</div>
</div>