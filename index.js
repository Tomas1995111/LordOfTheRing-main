let personajex = 120
let y = 384
let ancho = 40
let alto = 40

let sectionSeleccionarAtaque = document.getElementById("seleccionarAtaque")
let sectionReiniciar = document.getElementById("reiniciar")
let botonPersonajeJugador = document.getElementById("botonPersonaje")
let botonEditar = document.getElementById("botonEditar")
let botonFuego = document.getElementById("botonFuego")
let botonAgua = document.getElementById("botonAgua")
let botonTierra = document.getElementById("botonTierra")
let botonRayo = document.getElementById("botonRayo")
let botonReiniciar = document.getElementById("botonReiniciar")

let sectionSeleccionarPersonaje = document.getElementById("seleccionarPersonaje")
let inputGandalf = document.getElementById('gandalf')
let inputFrodo = document.getElementById('frodo')
let inputSam=document.getElementById('sam')
let inputMerry=document.getElementById('merry')
let inputPippin=document.getElementById('pippin')
let inputGimli=document.getElementById('gimli')
let inputLegolas=document.getElementById('legolas')
let inputBoromir=document.getElementById('boromir')
let inputAragorn=document.getElementById('aragorn')
let spanPersonajeJugador = document.getElementById("personajeJugador")

let spanPersonajeEnemigo = document.getElementById('personajeEnemigo')
let personajeJugador

let sectionMapa = document.getElementById("verMapa")
let lienzo = mapa.getContext("2d")

let vidaJugador = 100
let vidaEnemigo = 100

function iniciarJuego(){

    sectionSeleccionarAtaque.style.display = "none"
    sectionReiniciar.style.display = "none"
    sectionMapa.style.display = "none"
    botonPersonajeJugador.addEventListener("click", seleccionarPersonajeJugador)
    botonEditar.addEventListener("click", mostrarEditar)
    botonFuego.addEventListener("click", ataqueFuego)
    botonAgua.addEventListener("click", ataqueAgua)
    botonTierra.addEventListener("click", ataqueTierra)
    botonRayo.addEventListener("click", ataqueRayo)
    botonReiniciar.addEventListener("click", reiniciarJuego)
    botonDerecha.addEventListener("click", moverDerecha)
    botonIzquierda.addEventListener("click", moverIzquierda)
    botonArriba.addEventListener("click", moverArriba)
    botonAbajo.addEventListener("click", moverAbajo)
    
}

function mostrarEditar (){
        window.location.href = './personajes'
}

function seleccionarPersonajeJugador(){
sectionSeleccionarPersonaje.style.display = "none"
sectionMapa.style.display = "flex"

window.addEventListener("keydown", sePresionoUnaTecla)

if(inputGandalf.checked){
    personajeJugador = "gandalf"
    spanPersonajeJugador.innerHTML = personajeJugador
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputFrodo.checked){
    personajeJugador = 'frodo'
    spanPersonajeJugador.innerHTML = 'Frodo'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputSam.checked){
    personajeJugador = 'sam'
    spanPersonajeJugador.innerHTML = 'Sam'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputMerry.checked){
    personajeJugador = 'merry'
    spanPersonajeJugador.innerHTML = 'Merry'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputPippin.checked){
    personajeJugador = 'pippin'
    spanPersonajeJugador.innerHTML = 'Pippin'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputGimli.checked){
    personajeJugador = 'gimli'
    spanPersonajeJugador.innerHTML = 'Gimli'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputLegolas.checked){
    personajeJugador = 'legolas'
    spanPersonajeJugador.innerHTML = 'Legolas'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputBoromir.checked){
    personajeJugador = 'boromir'
    spanPersonajeJugador.innerHTML = 'Boromir'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else if(inputAragorn.checked){
    personajeJugador = 'aragorn'
    spanPersonajeJugador.innerHTML = 'Aragorn'
    document.getElementById("imagenPersonajeJugador").innerHTML =`<img src="./assets/${personajeJugador}.png" alt="">`
}else{
    alert('Selecciona un personaje')
    location.reload()
}

seleccionarPersonajeEnemigo()

dibujarMapa()
dibujarPersonaje()

}

function seleccionarPersonajeEnemigo() {
    
    let personajeAleatorio = aleatorio(1, 9)
    if (personajeAleatorio == 1) {
        spanPersonajeEnemigo.innerHTML = 'Gandalf'
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/gandalf.png" alt="">`
    } else if (personajeAleatorio == 2) {
        spanPersonajeEnemigo.innerHTML = 'Frodo'
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/frodo.png" alt="">`
    } else if (personajeAleatorio == 3) {
        spanPersonajeEnemigo.innerHTML = 'Sam'
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/sam.png" alt="">`
    } else if (personajeAleatorio == 4) {
        spanPersonajeEnemigo.innerHTML = "Merry"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/merry.png" alt="">`
    } else if (personajeAleatorio == 5){
        spanPersonajeEnemigo.innerHTML = "Pippin"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/pippin.png" alt="">`
    } else if (personajeAleatorio == 6){
        spanPersonajeEnemigo.innerHTML = "Gimli"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/gimli.png" alt="">`
    } else if (personajeAleatorio == 7){
        spanPersonajeEnemigo.innerHTML = "Legolas"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/legolas.png" alt="">`
    } else if (personajeAleatorio == 8){
        spanPersonajeEnemigo.innerHTML = "Boromir"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/boromir.png" alt="">`
    } else {
        spanPersonajeEnemigo.innerHTML = "Aragorn"
        document.getElementById("imagenPersonajeEnemigo").innerHTML =`<img src="./assets/aragorn.png" alt="">`
    }
}

function ataqueFuego(){
    ataqueJugador = "FUEGO"
    ataqueAleatorioEnemigo()
}
function ataqueAgua(){
    ataqueJugador = "AGUA"
    ataqueAleatorioEnemigo()
}
function ataqueTierra(){
    ataqueJugador = "TIERRA"
    ataqueAleatorioEnemigo()
}
function ataqueRayo(){
    ataqueJugador = "RAYO"
    ataqueAleatorioEnemigo()
}

function ataqueAleatorioEnemigo() {
    let ataqueAleatorio = aleatorio(1,4)
    if (ataqueAleatorio == 1) {
        ataqueEnemigo = "FUEGO"
    } else if (ataqueAleatorio == 2) {
        ataqueEnemigo = "AGUA"
    } else if (ataqueAleatorio == 3) {
        ataqueEnemigo = "TIERRA"
    } else {
        ataqueEnemigo = "RAYO"
    }
    crearMensaje()
}

function crearMensaje() {
    let sectionMensajes = document.getElementById("divMensajes")
    let sectionResultado = document.getElementById("divResultado")
    let parrafo = document.createElement("p")
    let parrafo1 = document.createElement("p")
    let fuerzaEnemigo = aleatorio(2,20)
    let fuerzaJugador = aleatorio(2,20)

    if(vidaJugador - fuerzaEnemigo <= 0) {
        vidaJugador = 0
    }else {
        vidaJugador = vidaJugador - fuerzaEnemigo
    }
    if(vidaEnemigo - fuerzaJugador <= 0) {
        vidaEnemigo = 0
    }else {
        vidaEnemigo = vidaEnemigo - fuerzaJugador
    }

    if (vidaEnemigo <= 0 && vidaJugador <= 0) {
        resultado = "EMPATE"
    } else if (vidaEnemigo <= 0) {
            resultado = "GANASTE"    
    } else if (vidaJugador <= 0) {
        resultado = "PERDISTE"
    } else {
        resultado = ""
    }

    if(vidaEnemigo <= 0 || vidaJugador <= 0) {
        botonFuego.disabled = true
        botonAgua.disabled = true
        botonTierra.disabled = true
        botonRayo.disabled = true
        
        sectionReiniciar.style.display = "block"
    }

    parrafo.innerHTML = "Atacaste con " + ataqueJugador + " y le restaste al enemigo " + fuerzaJugador + " puntos de vida. El enemigo ataco con " + ataqueEnemigo + " y te resto " + fuerzaEnemigo + " puntos de vida. "
    sectionMensajes.appendChild(parrafo)
  
    if(resultado != "" ){
    parrafo1.innerHTML = resultado
    sectionResultado.appendChild(parrafo1)
    } else {
    
}
 

    document.getElementById("vidaJugador").innerHTML = vidaJugador
    document.getElementById("vidaEnemigo").innerHTML = vidaEnemigo
    
    actualizarVida()
    
} 

function actualizarVida() {
    
    var root = document.documentElement;
    root.style.setProperty('--vidaJugador', vidaJugador);
    root.style.setProperty('--vidaEnemigo', vidaEnemigo);

    if (vidaJugador > 66) {
        root.style.setProperty('--colorVida', "Green");
    } else if (vidaJugador > 33) {
        root.style.setProperty('--colorVida', "Yellow");  
    } else if (vidaJugador > 0){
        root.style.setProperty('--colorVida', "red");
    }
}

function dibujarMapa(){
    mapa.width = 500
    mapa.height = 500
    let imagenMapa = new Image()
    imagenMapa.src = `./assets/mapa.png`
    lienzo.drawImage(
        imagenMapa,
        0,
        0,
        mapa.width,
        mapa.height,
    )
}

function dibujarPersonaje(){
    console.log(personajex)
    console.log(y)
lienzo.clearRect (0, 0, mapa.width, mapa.height)    
let imagenPersonaje = new Image()
imagenPersonaje.src = `./assets/${personajeJugador}.png`
lienzo.drawImage(
    imagenPersonaje,
    personajex,
    y,
    ancho,
    alto,
)
}

function moverDerecha(){
    if (personajex > 119 && personajex < 140 && y >100){
        
    } else if (personajex > 459){
    } else if (personajex > 339 && personajex < 370 && y < 163){
    } else personajex = personajex + 20
dibujarPersonaje()
nextt()
}


function moverAbajo(){

    if (y > 383 ){
    } else if (y > 83 && y < 163 && personajex > 120 && personajex < 320){  
    } else { y = y + 20
        dibujarPersonaje()
        nextt()
}
}



function moverArriba(){
    if (y < 50){
    } else if (y > 83 && y < 165 && personajex > 120 && personajex < 320){    
    } else if (y > 83 && y < 165 && personajex > 340 && personajex < 381){  
    
    } else { y = y - 20
        dibujarPersonaje()
        nextt()
}
}

function moverIzquierda(){

    if (personajex < 41){
    } else if (y > 85 && y < 163 && personajex > 179 && personajex < 321){  
    } else if (y > 163 && y < 385 && personajex > 120 && personajex < 181){ 
    } else if (y < 145 && personajex > 340 && personajex < 381){ 
    } else { personajex = personajex - 20
dibujarPersonaje()
nextt()
}
}



function nextt() {
    if(personajex > 379 && y < 80){
    sectionMapa.style.display = "none"
    sectionSeleccionarAtaque.style.display = "block"
}
}



function reiniciarJuego(){
    location.reload()
}
function aleatorio(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}

function sePresionoUnaTecla(event){
    switch (event.key) {
        case "ArrowUp":
            moverArriba()
            break
        case "ArrowDown":
            moverAbajo()
            break
        case "ArrowLeft":
            moverIzquierda()
            break
        case "ArrowRight":
            moverDerecha()
            break
        default:
            break                
    }
}

window.addEventListener('load', iniciarJuego)
