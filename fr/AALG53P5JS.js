//********Declaración de Variables*************************
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
//********Programa general, una sola vez e inicialización de variables********
function setup(){
  createCanvas(552, 552);
  estadoActual=[1,2,3,4,5,0,6,7,8,9,10];
  
  cy = (((height-2)/tamTablero)*8)+25;
  for(let j=0;j<100;j++){
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
  background(255, 255, 0);                                              
  stroke(0,0,0);
  line(0,400,550,400);
  line(0,450,550,450);
  for(let i=0;i<=550;i=i+50){ 
    line(i,400,i,450);  
  }
  textSize(15); 
  fill(0,0,0);
  text("JEU D'ÉCHELLE",180,20);
  text("Université Francisco José de Caldas",120,510);
  text("Master en éducation technologique",150,530);
  text("L'objectif du jeu est d'échanger la position des groupes de tuiles,",10,140);
  text("la couleur rouge doit être à la place du bleu et vice versa",10,160);
  text("Règle 1.) En cliquant sur l'onglet, il se déplace vers l'espace vide,",10,200); 
  text("                si les règles suivantes le permettent.  Sinon ça redémarre.",10,220);
  text("Règle 2.) Vous ne pouvez pas revenir à la position immédiatement précédente",10,240);
  text("Règle 3.) Vous ne pouvez sauter qu'un morceau de la couleur opposée",10,260);
  text("Mouvements:",10,310);
  text(contaMovimientos,125,310);
  text("Tentatives:",10,330);
  text(contaIntentos,125,330);
  //text("ValoresIgual:",10,350);
  //text(valoresIguales,125,350);
  fill(255,0,0);
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
  guardar_estado();
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
    //println("");
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
      text("Rappelez-vous la règle 2, tente à nouveau",10,260);
      alert("Rappelez-vous la règle 2, tente à nouveau");
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
           text("Rappelez-vous la règle 3, tente à nouveau",10,240);
           alert("Rappelez-vous la règle 3, tente à nouveau");
           reiniciarJuego();
           contaIntentos++;
           }
      }else {
           text("Rappelez-vous la règle 3, tente à nouveau",10,240);
           alert("Vous avez cliqué sur l'espace de jeu, réessayez");
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
  text("Félicitations, si vous avez fait 35 coups, vous avez gagné, si cela n'améliore pas votre record",10,250);
         alert("Félicitations, réessayez");
         reiniciarJuego();
         contaIntentos++;
      }
   }
}

function greet() {
  const name = nombre.value();
  const age = edad.value();
  const country = pais.value();
  text("Bienvenue",150,90);//question.html('Bienvenid@ ' + name + '!');
  //name.value('');
}
