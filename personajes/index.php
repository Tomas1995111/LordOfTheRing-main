<?php

require_once("../bd.php");

if(isset($_GET["txtID"])){
    //Recolectar los datos del metodo GET
    $txtID = isset($_GET["txtID"]) ? $_GET["txtID"] : "";
    //Preparar la eliminación de los datos
    $sentencia = $conexion->prepare("DELETE FROM `personajes` WHERE `id` = :id");
    //asignamos los valores que vienen del metodo GET a la consulta 
    $sentencia->bindValue(":id", $txtID);
    $sentencia->execute();
    header("Location: index.php");
}




$sentencia = $conexion->prepare("SELECT * FROM `personajes`");
$sentencia->execute();
$lista_personajes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="../styles.css">


<h1>Personajes</h1>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Vida</th>
                        <th scope="col">Ataque1</th>
                        <th scope="col">Ataque2</th>
                        <th scope="col">Ataque3</th>
                        <th scope="col">Ataque4</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_personajes as $registro) { ?> 
                    <tr class="">
                        <td scope="row"><?php echo $registro['id']; ?> </td>
                        <td><?php echo $registro['nombre']; ?></td>
                        <td>
                            <img width="60" class="img" src="../assets/<?php echo $registro['nombre'] . ".png"; ?>" />
                        </td>
                        <td><?php echo $registro['vida']; ?></td>
                        <td><?php echo $registro['ataque1']; ?></td>
                        <td><?php echo $registro['ataque2']; ?></td>
                        <td><?php echo $registro['ataque3']; ?></td>
                        <td><?php echo $registro['ataque4']; ?></td>
                        <td>
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>    
                </tbody>
            </table>
        </div>
        
    </div>
    <a class="btn btn-danger btn-lg" href="../index.php">Cancelar</a>
    <div class="card-footer">
    </div>
    
</div>