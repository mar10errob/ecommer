/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

// $(document).ready(function(){
// 	var cantidad  = $('#cantidad1').val();
// 	var precio = $('#precio1').text();
// 	$('#mas1').on('click', function(event) {
// 		event.preventDefault();
// 		cantidad++;
// 		$('#total1').text(cantidad*precio);
// 		$('#cantidad1').val(cantidad);
// 		/* Act on the event */
// 	});
// 	$('#menos1').on('click', function(event) {
// 		event.preventDefault();
// 		if(cantidad > 1){
// 			cantidad--;
// 			$('#total1').text(cantidad*precio);
// 			$('#cantidad1').val(cantidad);
// 		}		
// 		/* Act on the event */
// 	});
// });

$(document).ready(function(){
	var cantidad  = $('#cantidad').val();
	// {{ path('add_carrito', { 'cliente': app.user.id ,'producto': producto.id })}}
	var direccion = $('#add-car').attr('href');
	$('#mas').on('click', function(event) {
		event.preventDefault();
		cantidad++;		
		$('#cantidad').val(cantidad);
		$('#add-car').attr('href',direccion+"/"+cantidad);
		/* Act on the event */
	});
	$('#menos').on('click', function(event) {
		event.preventDefault();
		if(cantidad > 1){
			cantidad--;
			$('#cantidad').val(cantidad);
		}		
		/* Act on the event */
	});
});

// function mostraralerta(){
// 	// var cantidad = document.querySelector("#car-total").text;
// 	var c=lista[0].value;
// 	alert('se ha cambiado ' + c);
// 	// var cantidad=document.querySelector(".cart_quantity_input");
// 	// var suma=cantidad.value + 1;
// 	// cantidad.value;
// }
// function hacerclick(){
// 	var lista =document.querySelectorAll(".cart_quantity_input");
// 	for(var f=0; f<lista.length; f++ ){
// 		lista[f].addEventListener('change', function(){
// 			alert('Si sirve asi! ' + lista[f].value);
// 		}, true);
// 	}
	
// 	// var elemento=document.querySelector("a.update");
// 	// elemento.addEventListener('click', mostraralerta, false);
// }
// window.addEventListener('load', hacerclick, false);
// function indica(){
// 	var index=document.querySelectorAll("#index");
// 	p=[];
// 	for (var i = 0; i < index.length; i++) {
// 		p[i]=index[i].value;
// 	}
// 	document.querySelector(".cart_quantity_input"+p[0]).addEventListener('change', function(){
// 			alert(document.querySelector("#car-total"+p[0]).innerHTML);
// 		}, true);
// 	// for(var j=0; j<p.length; j++){
// 	// 	alert(p[j]);
// 	// }
// }
// window.addEventListener('load',indica,false);

// lista =document.querySelectorAll(".cart_quantity_input");
// for(var f=0; f<lista.length; f++ ){
// 	lista[f].addEventListener('change', function(){
// 		var t=document.querySelector("#car-total").innerHTML;
// 		alert('Si sirve asi! ' + t);
// 	}, false);
// }

// var divs=document.getElementsByTagName('div');
// for (var i = 0; i< divs.length; i++) {
// 	alert('Elemento N° '+(i+1)+': '+divs[i]);
// };
var index=document.querySelectorAll("#index");
var p=[];
var j=0;
for (var i = 0; i < index.length; i++) {
	p[i]=index[i].value;
}
for (var i = 0; i < p.length; i++) {
	entrada=document.querySelector("#car-input"+p[i]);
	generaEvent(i);
}
function generaEvent(indice){
	entrada.addEventListener('change', function(){
		var precio=document.querySelector("#precio"+p[indice]).innerHTML;
		document.querySelector("#car-total"+p[indice]).innerHTML=(precio * document.querySelector("#car-input"+p[indice]).value);
	}, true);
}
