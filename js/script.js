$(document).ready(inicio);
	
function inicio() {

	modulosCheck = [];

	$('#form-encuesta').submit(function(ev){
		ev.preventDefault();
		var respuestas = guardarRespuestas();
		console.log(respuestas);
		//guardarDragAndDrop();
		//waitScreen(true);
		//setTimeout(() => {  waitScreen(false); }, 2000);
		//setTimeout(() => {  responseWS(true,"IF-2020-001234- -GDEBA-TESTGDEBA"); }, 2500);
		//setTimeout(() => {  responseWS(false,"Error"); }, 2500);
		/*
		var calif = guardarCalificaciones();
		var respuestas = guardarRespuestas();
		if (calif != undefined){
			registrarEncuesta(calif,respuestas);
		} else {
			alert("Debe calificar en todas las preguntas");
		}*/
	});

	$('#close-screen').on('click',function(ev){
		ev.preventDefault();
		waitScreen(false);
		location.reload();
	});


	$('#paso-1').show();
	$('#paso-2').hide();
	$('#paso-3').hide();
	$('#paso-4').hide();
	$('#paso-5').hide();

	$('.encabezado-1').show();
	$('.encabezado-2').hide();
	$('.encabezado-3').hide();
	$('.encabezado-4').hide();
	$('.encabezado-5').hide();


	$('#paso-1 button.btn-sig').on('click',function(ev){
		ev.preventDefault();
		//$('#paso-1').slideToggle();
		//$('#paso-2').slideToggle();
		$('#paso-1').fadeOut(2);
		$('#paso-2').fadeIn("slow");

		$('.encabezado-1').fadeOut(2);
		$('.encabezado-2').fadeIn("fast");
		$("html, body").animate({
		    scrollTop: 0
		}, 350);
	});

	$('#paso-2 button.btn-sig').on('click',function(ev){
		ev.preventDefault();

		//obtener checks modulos
		$("input:checkbox[name=modulos-utilizados]:checked").each(function(){
		    modulosCheck.push($(this).val());
		});
		//console.log(modulosCheck);

		$('#paso-2').fadeOut(2);
		$('#paso-3').fadeIn("slow");

		$('.encabezado-2').fadeOut(2);
		$('.encabezado-3').fadeIn("fast");

		//console.log(modulosCheck.lenght);
		//console.log(modulosCheck[0]);


		for (var i = 0; i < modulosCheck.length; i++) {
			switch (modulosCheck[i]) { 
				case 'EE': 
					$('#module-ee').show();
					console.log('EE');
					break;
				case 'CCOO': 
					$('#module-ccoo').show();
					console.log('CCOO');
					break;
				case 'GEDO': 
					$('#module-gedo').show();
					console.log('GEDO');
					break;
				default:
					console.log('');
			}
		}

		$("html, body").animate({
		    scrollTop: 0
		}, 350);
	});

	$('#paso-3 button.btn-sig').on('click',function(ev){
		ev.preventDefault();
		$('#paso-3').fadeOut(2);
		$('#paso-4').fadeIn("slow");

		$('.encabezado-3').fadeOut(2);
		$('.encabezado-4').fadeIn("fast");
		$("html, body").animate({
		    scrollTop: 0
		}, 350);
		
	});

	$('#paso-4 button.btn-sig').on('click',function(ev){
		ev.preventDefault();
		$('#paso-4').fadeOut(2);
		$('#paso-5').fadeIn("slow");

		$('.encabezado-4').fadeOut(2);
		$('.encabezado-5').fadeIn("fast");
		$("html, body").animate({
		    scrollTop: 0
		}, 350);
		
	});



	$('.ta-control').click(function(e){
		//e.stopPropagation();
		e.preventDefault();
		//$('#children').click(function(e) {e.stopPropagation()});
		var ID = $(this).attr('id');
		textareaOtra(ID);
	});


/*************  CALIF BAR *********************/
 /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    //var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    //console.log(ratingValue);
    
  });
/*************  CALIF BAR END  *********************/



/*********** SORTABLE LIST ******************/
var dragging, placeholders = $();
$.fn.sortable = function(options) {
	var method = String(options);
	var nums = $('ul.numeracion');
	// console.log(nums);
	options = $.extend({
		connectWith: false
	}, options);
	return this.each(function() {
		if (/^enable|disable|destroy$/.test(method)) {
			var items = $(this).children($(this).data('items')).attr('draggable', method == 'enable');
			if (method == 'destroy') {
				items.add(this).removeData('connectWith items')
					.off('dragstart.h5s dragend.h5s selectstart.h5s dragover.h5s dragenter.h5s drop.h5s');
			}
			return;
		}
		var isHandle, index, items = $(this).children(options.items);
		var placeholder = $('<' + (/^ul|ol$/i.test(this.tagName) ? 'li' : 'div') + ' class="sortable-placeholder">');
		items.find(options.handle).mousedown(function() {
			isHandle = true;
			//$(nums).show();
		}).mouseup(function() {
			isHandle = false;
			//$(nums).css("display","none");
		});
		$(this).data('items', options.items)
		placeholders = placeholders.add(placeholder);
		if (options.connectWith) {
			$(options.connectWith).add(this).data('connectWith', options.connectWith);
		}
		items.attr('draggable', 'true').on('dragstart.h5s', function(e) {
			if (options.handle && !isHandle) {
				return false;
			}
			isHandle = false;
			var dt = e.originalEvent.dataTransfer;
			dt.effectAllowed = 'move';
			dt.setData('Text', 'dummy');
			index = (dragging = $(this)).addClass('sortable-dragging').index();
		}).on('dragend.h5s', function() {
			dragging.removeClass('sortable-dragging').show();
			$(nums).show();/******************/
			placeholders.detach();
			if (index != dragging.index()) {
				//$(nums).hide();/******************/
				items.parent().trigger('sortupdate', {item: dragging});
			}
			dragging = null;
		}).not('a[href], img').on('selectstart.h5s', function() {
			this.dragDrop && this.dragDrop();
			return false;
		}).end().add([this, placeholder]).on('dragover.h5s dragenter.h5s drop.h5s', function(e) {
			if (!items.is(dragging) && options.connectWith !== $(dragging).parent().data('connectWith')) {
				return true;
			}
			if (e.type == 'drop') {
				e.stopPropagation();
				//$(nums).show();
				placeholders.filter(':visible').after(dragging);
				return false;
			}
			e.preventDefault();
			e.originalEvent.dataTransfer.dropEffect = 'move';
			if (items.is(this)) {
				if (options.forcePlaceholderSize) {

					placeholder.height(dragging.outerHeight());
				}
				dragging.hide();
				$(nums).hide(); /******************/
				$(this)[placeholder.index() < $(this).index() ? 'after' : 'before'](placeholder);
				placeholders.not(placeholder).detach();
			} else if (!placeholders.is(this) && !$(this).children(options.items).length) {
				placeholders.detach();

				$(this).append(placeholder);
			}
			return false;
		});
	});
};
/*********** SORTABLE LIST END **************/

}



function guardarDragAndDrop(){
	var drag = $('ul.sortable.list li');
	var item;
	var concat="";
	for (var i = 0; i < drag.length; i++) {
		item = $(drag)[i];
		concat = concat + $(item).text() + ";";
	}
	//console.log(concat);
	return concat;
}



function waitScreen(status){
	var screen = $('div.back-loading');
	if (status){
		$(screen).slideUp( 300 ).fadeIn( 400 );
		$('html,body').animate({
        	scrollTop: $(screen).offset().top+600
    	}, 'slow');
		
	} else {
		$(screen).slideDown( 300 ).fadeOut( 400 );
	}
}

function responseWS(status, msg){
	var img_load = $('#img-load');
	var img_exito = $('#img-successWS');
	var img_error = $('#img-errorWS');
	var mensaje = $('#responseWS');
	var mensajeEncabezado = $('#encabezado');
	$(img_load).css("display","none");
	$('#close-screen').show();
	if (status){
		$(mensajeEncabezado).css("display","block");
		$(mensajeEncabezado).append("<strong>Exito!</strong>");
		$(img_exito).slideUp( 300 ).fadeIn( 350 );
		$(mensaje).text("Gracias por realizar la encuesta, puede consultar el GEDO generado en GDEBA: ");
		$(mensaje).append("<br><strong>"+msg+"</strong>");
		$('.loading').css("height","250px");
		$('.loading').css("padding-top","2em");
	} else {
		$(mensajeEncabezado).css("display","block");
		$(mensajeEncabezado).append("<strong>Algo salió mal</strong>");
		$(mensaje).text("");
		$(mensaje).append("<strong>Ha ocurrido un error, por favor intente nuevamente.</strong>");
		$(img_error).slideUp( 300 ).fadeIn( 350 );
		$('.loading').css("height","230px");
		$('.loading').css("padding-top","2em");
	}
}




function guardarCalificaciones(){
	var barras = $('ul#stars');
	var cantBarras = barras.length;
	var arrayCalif = [];
	var current, currentVal;
	var error=0;
	for (var i = 0; i < cantBarras; i++) {
		current = $(barras)[i];
		currentVal = $(current).find('.selected').last().data('value');
		if (currentVal > 0 && currentVal <= 5 && currentVal != undefined) {
			arrayCalif.push(currentVal);
		} else {
			error++;
		}
	}
	if (error==0) {
		return arrayCalif;
	} else {
		//alert("Debe calificar en todas las preguntas");
	}
	
}

function guardarRespuestas(){
	var respuesta = $('textarea.respuesta');
	var cantRespuesta = respuesta.length;
	var arrayResp = [];
	var current, currentVal;
	for (var i = 0; i < cantRespuesta; i++) {
		current = $(respuesta)[i];
		currentVal = $(current).val();
		arrayResp.push(currentVal);
	}
	var dragdrop = guardarDragAndDrop();
	arrayResp.push(dragdrop);
	var respLibre = $('.respuesta-libre').val();
	arrayResp.push(respLibre);
	return arrayResp;
}



function registrarEncuesta(calif,respue){

	$.ajax({
		type: "POST",
		url: "ajax/registrar_encuesta.php",
		data: { calificaciones: calif, respuestas: respue },
		success: function(resp){
			console.log(resp);
		},
		error: function(){
			console.log("ERROR");
		}
	});
}



function consultarTipoDocumento(ws){
	var div_resultado = $('#resultadoWS');
	$(div_resultado).empty();
	
	var acronimo = $('#acronimo').val();
	//console.log(cuit);
	$.ajax({
		type: "POST",
		url: "ajax/ejecutar_ws.php",
		data: ('ws='+ws+'&acronimo='+acronimo),
		dataType : "html",
		success: function(resp){
			//console.log(resp);
			$(div_resultado).empty();
			$(div_resultado).append(resp);
		}
	});
}


function buscarPorNombre(ws){
	var div_resultado = $('#resultadoWS');
	$(div_resultado).empty();
	
	var nombreFormulario = $('#nombreFormulario').val();
	//console.log(cuit);
	$.ajax({
		type: "POST",
		url: "ajax/ejecutar_ws.php",
		data: ('ws='+ws+'&nombreFormulario='+nombreFormulario),
		dataType : "html",
		success: function(resp){
			//console.log(resp);
			$(div_resultado).empty();
			$(div_resultado).append(resp);
		}
	});
}


function buscarPorUUID(ws){
	var div_resultado = $('#resultadoWS');
	$(div_resultado).empty();
	
	var uuid = $('#uuid').val();
	//console.log(cuit);
	$.ajax({
		type: "POST",
		url: "ajax/ejecutar_ws.php",
		data: ('ws='+ws+'&uuid='+uuid),
		dataType : "html",
		success: function(resp){
			//console.log(resp);
			$(div_resultado).empty();
			$(div_resultado).append(resp);
		}
	});
}



function contarCaracteres(resp){
	//console.log($('.respuesta').val(resp));
	var respInputs = $('.respuesta');
	var respuestaSelect = respInputs[resp];
	var respuestaWrite = $(respuestaSelect).val();
	//console.log(respuestaWrite);
	var permitidos = 250;
	//var ingresadosSelect = respInputs[resp];//.val().length
	var caracteresIngresados = $(respuestaSelect).val().length;
	//console.log('ingresados: '+caracteresIngresados);
	if(caracteresIngresados > permitidos){
		var newR = bio.substr(0,permitidos);
		$('.respuesta').val(newR);
		var caracteresIngresados = $('.respuesta').val().length;
	}
	var log = "<p><small>"+caracteresIngresados + " / " + permitidos+"</small></p>";
	//var caracteresRespuesta = '.caracteres-'+resp;
	//console.log($('.caracteres')[resp]);
	var p_caracteres = $('.caracteres');
	var caracteresSelect = p_caracteres[resp];
	$(caracteresSelect).empty()[resp];
	$(caracteresSelect).append(log)[resp];
}

function contarCaracteres500(resp){
	//console.log($('.respuesta').val(resp));
	var respInputs = $('.respuesta');
	var respuestaSelect = respInputs[resp];
	var respuestaWrite = $(respuestaSelect).val();
	//console.log(respuestaWrite);
	var permitidos = 500;
	//var ingresadosSelect = respInputs[resp];//.val().length
	var caracteresIngresados = $(respuestaSelect).val().length;
	//console.log('ingresados: '+caracteresIngresados);
	if(caracteresIngresados > permitidos){
		var newR = bio.substr(0,permitidos);
		$('.respuesta').val(newR);
		var caracteresIngresados = $('.respuesta').val().length;
	}
	var log = "<p><small>"+caracteresIngresados + " / " + permitidos+"</small></p>";
	//var caracteresRespuesta = '.caracteres-'+resp;
	//console.log($('.caracteres')[resp]);
	var p_caracteres = $('.caracteres');
	var caracteresSelect = p_caracteres[resp];
	$(caracteresSelect).empty()[resp];
	$(caracteresSelect).append(log)[resp];
}


function contarCaracteres2500(resp){
	//console.log($('.respuesta').val(resp));
	var respInputs = $('.respuesta-libre');
	var respuestaSelect = respInputs[resp];
	var respuestaWrite = $(respInputs).val();
	//console.log(respuestaWrite);
	var permitidos = 2500;
	//var ingresadosSelect = respInputs[resp];//.val().length
	var caracteresIngresados = $(respInputs).val().length;
	//console.log('ingresados: '+caracteresIngresados);
	if(caracteresIngresados > permitidos){
		var newR = bio.substr(0,permitidos);
		$('.respuesta-libre').val(newR);
		var caracteresIngresados = $('.respuesta-libre').val().length;
	}
	var log = "<p><small>"+caracteresIngresados + " / " + permitidos+"</small></p>";
	//var caracteresRespuesta = '.caracteres-'+resp;
	//console.log($('.caracteres')[resp]);
	var p_caracteres = $('.caracteres.caracteres-libre');
	var caracteresSelect = p_caracteres[resp];
	$(p_caracteres).empty()[resp];
	$(p_caracteres).append(log)[resp];
}


function textareaOtra(inputID){
	var nroCheck = inputID;

	var i = "#"+nroCheck+" input";
	var checkbox = $(i);

	var idTA = nroCheck.split("otra-");
	var selectTA = '#divTA-'+idTA[1];

	var TAClean = '#divTA-'+idTA[1]+" textarea";
	$(TAClean).val("");

	if ( $(selectTA).css('display') != 'none' ){
		console.log("visible");
		$(selectTA).css("display","none");
		$(checkbox).prop("checked", false);
	} else {
		$(selectTA).css("display","block");
		console.log("invisible");
		$(checkbox).prop("checked", true);
	}
}








