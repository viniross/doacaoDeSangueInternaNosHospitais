$(document).ready(function(){
   
    var slides = $(".div-slider input[type=radio]"); // seleciona os inputs de rádio na div
    var slidesLength = slides.length; // conta o número de slides
    var intervalo = 3; // intervalo em segundos
    var currentIndex = 0;
 
    function rodar(){
       currentIndex = (currentIndex + 1) % slidesLength; // avança para o próximo slide (se estiver no último, volta para o primeiro)
       slides.eq(currentIndex).prop("checked", true).change(); // marca o próximo slide como ativo e dispara o evento change
    }
    
    var tempo = setInterval(rodar, intervalo * 1000); // inicia o temporizador
    
    $(".div-slider").hover(
       function(){ // quando o mouse entra
          clearInterval(tempo); // pausa o temporizador
       },
       function(){ // quando o mouse sai
          tempo = setInterval(rodar, intervalo * 1000); // reinicia o temporizador
       }
    );
    
 });
 