<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lordofthering";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los nombres de la base de datos
$sql = "SELECT nombre FROM personajes";
$result = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Lord Of the Rings</title>
    </head>
    <body>


        <section id="seleccionarPersonaje">
            <h1 class = "titulo">Lord of the ringss</h1>
            <h2 class="subtitulo">Elige tu personaje</h2>
          

             <div class="tarjetas">


             <?php
             
             // Generar el código HTML para cada nombre
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombre = $row["nombre"];
        $html_code = '
<input type="radio" name="personaje" id="'.$nombre.'" />
<label class="tarjetaPersonaje" for="'.$nombre.'">
    <p>'.$nombre.'</p>
    <img height=74px src="./assets/'.$nombre.'.png" alt="'.$nombre.'">
    </label>';
        echo $html_code;
    }
} else {
    echo "No se encontraron resultados.";
}

?>

             </div>   
            
            <button id="botonPersonaje">Seleccionar</button>
            <h2 class="subtitulo">Edita y agrega tu personaje</h2>
            <button id="botonEditar">Editar</button>

            </section>
            <section id="verMapa">
                <h1 class = "titulo">Lord of the rings</h1>
                <h3 class = "titulo">Recorre el mapa con tu personaje</h3>
                <canvas id="mapa"></canvas>   
                <div class="divBotones">
                <button class="botonMover" id="botonArriba">Arriba</button> 
                </div>

                <div class="divBotones">
                <button class="botonMover" id="botonIzquierda">Izquierda</button> 
                <button class="botonMover" id="botonAbajo">Abajo</button> 
                <button class="botonMover" id="botonDerecha">Derecha</button> 
                </div>
            </section>

            <section id="seleccionarAtaque">
            <h1 class = "titulo">Lord of the rings</h1>
        <div class="gridCombate">

            <div class="divJugador">
                <p>
                    <span id="personajeJugador"></span>
                </p> 
                <div id="imagenPersonajeJugador">
                </div>
                <div class="divVida"></div>
                <p>
                <span id="vidaJugador">100</span>/100
                </p>
                
            </div>
            <div class="divNpc">
                <p>
                    <span id="personajeEnemigo"></span>
                </p> 
                <div id="imagenPersonajeEnemigo">
                </div>
                <div class="divVidaEnemigo"></div>
                <p>
                <span id="vidaEnemigo">100</span>/100
                </p>               
            </div>
            
            <div class="cajaBotones">   
            <div class="cajitaBoton"><button class = "botonAtaque" id="botonFuego">Fuego 🔥</button></div>
            <div class="cajitaBoton"><button class = "botonAtaque" id="botonAgua">Agua 💧</button></div>
            <div class="cajitaBoton"><button class = "botonAtaque" id="botonTierra">Tierra 🌱</button></div>
            <div class="cajitaBoton"><button class = "botonAtaque" id="botonRayo">Rayo ⚡</button></div>
            </div>
            <section id="resultado">
                <div id="divResultado" class="divResultado">
                    <section id="mensajes">
                        <div id="divMensajes"></div>
                    </section>
                </div>
                <section id="reiniciar">
                    <div class="divReiniciar">
                <button id="botonReiniciar">Reiniciar</button>  
                    </div>        
            </section>
        
            
        </div> 
            
            </section>
        </section>
        <script src="./index.js"></script>
            </body>
            </html>
        
        