//********Declaración de Variables*************************
let err = [];
let tamCaja = 20;
let tamTablero = 11;
let distancia = 0.0;
let x1 = 0.0;
let x2 = 0.0;
let cy = 0.0;
let posicion;
let espacio;
let espacioJuego = 0;
let posEJ = 0;
let posV1;
let fichaJuego = 0;
let posFJ = 0;
let posV2;
let distance1;
let distance2;
let fichaInter;
let posicionesX = [];
let posantX = [];
let msc = [];
let cb = [];
let estadoActual = [];
let movimiento=[];
let trayectoriaSujeto = [];
let pospru = 0;
let contaMovimientos = 0;
let contaIntentos = 1;
let valoresIguales = 0;
let equipo;
let input, button, greeting;
let movimiento_v ="null";
let uid ="null";
let ancho;
let alto;
let cnv;

//********Programa general, una sola vez e inicialización de variables********
function setup(){
    
  //createCanvas(552, 180);
  
   ancho=windowWidth;
  alto=windowHeight;
 // var cnv = createCanvas(windowWidth, windowHeight);
  cnv = createCanvas(552, 180);
  cnv.position(ancho*0.25, alto*0.65);
  estadoActual=[1,2,3,4,5,0,6,7,8,9,10];

  //cy = (((height-2)/tamTablero)*8)+25;
  cy = (((height*0.77)/tamTablero)*8)+25;
  for(let j=0;j<500;j++){
    trayectoriaSujeto[j]=[];
  }

  // nombre = createInput();
  // nombre.position(5, 70);
  // edad = createInput();
  // edad.position(185, 70);
  // pais = createInput();
  // pais.position(365, 70);
  // button = createButton('Registrar');
  // button.position(230, 100);
  // button.mousePressed(greet);
  // question1 = createElement('h3', '¿Como te llamas?');
  // question1.position(5, 25);
  // question2 = createElement('h3', '¿Cuántos años tienes?');
  // question2.position(185, 25);
  // question3 = createElement('h3', '¿De qué país eres?');
  // question3.position(365, 25);

  for(let i=0; i<tamTablero; i++){
    posantX[i]=((((width-2)/tamTablero))*i)+25;
    movimiento [i]=estadoActual[i];
    //trayectoriaSujeto[i]=movimiento;
    msc[i]=false;
    cb[i]=false;
  }
  trayectoriaSujeto[0]=movimiento;
  rectMode(RADIUS);
  contaMovimientos=0;
  contaIntentos=1;
  valoresIguales=0;
  espacioJuego=0;
  posEJ=0;
  fichaJuego=0;
  posFJ=0;
}
//******Bucle o Loop*****************************************
function draw() {
  // Fondo degradado
  let gradient = drawingContext.createLinearGradient(0, 0, width, height);
  gradient.addColorStop(0, '#f0f0f0');
  gradient.addColorStop(1, '#d9d9d9');
  drawingContext.fillStyle = gradient;
  rect(0, 0, width, height);

  stroke(0, 0, 0);
  line(0, 100, 550, 100);
  line(0, 150, 550, 150);
  for (let i = 0; i <= 550; i = i + 50) {
      line(i, 100, i, 150);
  }

  textSize(15);
  fill(0, 0, 0);
  text("Movimientos:", 10, 40);
  text(contaMovimientos, 125, 40);
  text("Intentos:", 10, 60);
  text(contaIntentos, 125, 60);

  fill(255, 0, 0);
  deterEquipo();
  mouseSobreFicha();
  detectarGanador();
}
//******Determina a que equipo pertenece**********************
function deterEquipo(){
  for(let i=0; i<tamTablero; i++){
  if((estadoActual[i]>0)&&(estadoActual[i]<6)){
    equipo=1;
    }else if(estadoActual[i]>5){
    equipo=2;
    }else if (estadoActual[i]==0){
    equipo=3;
    }
    pintarFichas(equipo,i+1);
  }
}
//******Pintar las fichas*********************
function pintarFichas(team, casilla) {
  if(team==1){
    stroke(250,0,0);
    fill(250,0,0);
  }else if(team==2){
    stroke(0,0,250);
    fill(0,0,250);
  }else{
    noStroke();
    noFill();
  }
  pospru=((((width-2)/tamTablero))*casilla)-25;
  rect(pospru, cy, tamCaja, tamCaja);
  posicionesX[casilla-1]=pospru;
}
//******¿Está el mouse sobre la ficha?************************
function mouseSobreFicha() {
  for(let i=0; i<tamTablero; i++){
    if (mouseX > ((posantX[i])-tamCaja) && mouseX < ((posantX[i])+tamCaja) && mouseY > cy-tamCaja && mouseY < cy+tamCaja) {
      msc[i] = true;
      if(!cb[i]) {
        stroke(0);
      } } else {
        stroke(0,255,0);
        msc[i] = false;
      }
  }
}
//******Mouse click*****************************
function mousePressed() {
  for(let i=0;i<tamTablero;i++){
    if(msc[i]) {
      cb[i] = true;
      fill(0, 255, 0);
      rastrearEspacioJuego();
      rastrearFichaJuego();
      calcularDistancia1();
      reglaTres();
      reglaDos();
      } else {
        cb[i] = false;
      }
  }
  trayectoriasSujeto();
  printTrayectoriaSujeto();
  movimiento_v = estadoActual.toString();
  
   let uid = $("#uid").text();
//let gid = $("#gid").text();

		//$.post( "servicios/insercion_Juego_escalera.php", {id: uid, intento : contaIntentos, movimiento : contaMovimientos, trayectoria:movimiento_v, err : err.toString()} )
	$.post( "servicios/insercion_Juego_escalera.php", {id: uid, intento : contaIntentos, movimiento : contaMovimientos, trayectoria:movimiento_v} )
		.done(function( data ) {
		//alert( "Data Loaded: " + data );
	});
  
  //guardar_estado();
}
//*********Mouse Click Sostenido****************************
function mouseDragged() {
}

function mouseReleased() {
}
//*******Busca la ubicación del espacio libre***************
function rastrearEspacioJuego() {
  for(let i=0; i<tamTablero; i++){
    if (estadoActual[i]==0){
      espacioJuego=estadoActual[i];
      posEJ=posicionesX[i];
      posV1=i;
    }
  }
}
//******Respecto a la posición del mouse identifica la ficha de juego******************
function rastrearFichaJuego() {
  for(let i=0; i<tamTablero; i++){
    if (mouseX > ((posantX[i])-tamCaja) && mouseX < ((posantX[i])+tamCaja) && mouseY > cy-tamCaja && mouseY < cy+tamCaja) {
      fichaJuego=estadoActual[i];
      posFJ=posicionesX[i];
      posV2=i;
      err[contaIntentos]=fichaJuego;
    }
  }
}
//*********Calcula la distancia entre la ficha y el espacio libre ***********
function calcularDistancia1() {
  distance1=abs(posEJ-posFJ);
}
//******Almacena la trayectoria del jugador******************
function trayectoriasSujeto() {
  //for(let j=0;j<100;j++){
  //  trayectoriaSujeto[j]=[];
  //}
  for(let i=0;i<tamTablero;i++){
       trayectoriaSujeto[contaMovimientos][i]=estadoActual[i];
    }
}
//******Imprime la trayectoria del jugador*******************
function printTrayectoriaSujeto() {  //enviar los datos a consola
  //println("TrayectoriaSujeto: ");
  for(let i=0;i<contaMovimientos+1;i++){
    for(let j=0;j<tamTablero;j++){
      //print((trayectoriaSujeto[i][j]));
      //print(estadoActual[j]);
    }
    // err.push(i);
  }
}
//*********Regla2 no devolverse *************************
function reglaDos() {
  if(contaMovimientos>1){
    for(let i=0;i<tamTablero;i++){
      if(trayectoriaSujeto[contaMovimientos-2][i]==estadoActual[i]){
        valoresIguales++;
      }
    }
    if(valoresIguales==tamTablero){
      contaIntentos++;
      valoresIguales=0;
      text("Recuerde la regla 2, intenta de nuevo",10,260);
      alert("Recuerde la regla 2, intenta de nuevo");
      reiniciarJuego();
      }else{
        valoresIguales=0;
      }
    }

}

//********Regla3 solo salta una ficha de color contrario *****
function reglaTres() {
  if(distance1==50){
        estadoActual[posV1]=fichaJuego;
        estadoActual[posV2]=espacioJuego;
        contaMovimientos++;
      }else if(distance1==100){
         fichaInter=estadoActual[((posV1+posV2)/2)];
         if(((fichaInter>0&&fichaInter<6)&&(fichaJuego>5&&fichaJuego<11))||((fichaInter>5&&fichaInter<11)&&(fichaJuego>0&&fichaJuego<6))){
           estadoActual[posV1]=fichaJuego;
           estadoActual[posV2]=espacioJuego;
           contaMovimientos++;
         }else {
           text("Recuerde la regla 3, intenta de nuevo",10,240);
           alert("Recuerde la regla 3, intenta de nuevo ");
           reiniciarJuego();
           contaIntentos++;
           }
}else if(distance1>100){
  alert("Recuerde la regla 3, intenta de nuevo ");
            reiniciarJuego();
            contaIntentos++;
      }

      else {
           text("Recuerde la regla 3, intenta de nuevo",10,240);
           alert("Hiciste clic en el espacio de juego, intenta de nuevo");
           reiniciarJuego();
           contaIntentos++;
      }
}
//******Estado de inicio y reinicio del juego************
function reiniciarJuego() {
      estadoActual=[1,2,3,4,5,0,6,7,8,9,10];
      contaMovimientos=0;
      valoresIguales=0;
}
//******Detectar ganador*******************
function detectarGanador() {
  if((estadoActual[0]==6)&&(estadoActual[1]==7)&&(estadoActual[2]==8)&&(estadoActual[3]==9)&&(estadoActual[4]==10)&&(estadoActual[5]==0)&&(estadoActual[6]==1)&&(estadoActual[7]==2)&&(estadoActual[8]==3)&&(estadoActual[9]==4)&&(estadoActual[10]==5)){
  if((trayectoriaSujeto[contaMovimientos][4]==10)&&trayectoriaSujeto[contaMovimientos][6]==1){
  text("Felicitaciones, si realizaste 35 movimientos ganaste, si no mejora tu record",10,250);
         alert("Felicitaciones");
         reiniciarJuego();
         contaIntentos++;
      }
   }
}

function greet() {
  const name = nombre.value();
  const age = edad.value();
  const country = pais.value();
  text("Bienvenid@",150,90);//question.html('Bienvenid@ ' + name + '!');
  //name.value('');
}

function doubleClicked()
{
  alert("Docle click no esta definido");
}
