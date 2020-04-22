<form id="form-encuesta">
	<fieldset>
		<legend>Responda las siguientes preguntas:</legend>


		<label class="soft"><small>Pregunta 1</small></label><br>
		<label>¿Que tan conforme esta con GDEBA?</label><br><br>
		<div class='rating-stars text-center'>
		    <ul id='stars'>
		      <li class='star' title='Muy malo' data-value='1'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Malo' data-value='2'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Regular' data-value='3'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Bueno' data-value='4'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Muy bueno' data-value='5'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		    </ul>
	  	</div><br>
		<label class="soft"><small>Respuesta</small></label><br>
		<textarea name="" id="0" cols="30" rows="5" class="form-control respuesta" placeholder="Ingrese su respuesta" maxlength="250" onkeydown="contarCaracteres(this.id)" onkeyup="contarCaracteres(this.id)" onblur="contarCaracteres(this.id)"></textarea>
		<div class="caracteres"><p><small>0 / 250</small></p></div><br><br>


		<label class="soft"><small>Pregunta 2</small></label><br>
		<label>¿Nivel de complejidad del sistema?</label><br><br>
		<div class='rating-stars text-center'>
		    <ul id='stars'>
		      <li class='star' title='Muy malo' data-value='1'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Malo' data-value='2'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Regular' data-value='3'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Bueno' data-value='4'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Muy bueno' data-value='5'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		    </ul>
	  	</div><br>
		<label class="soft"><small>Respuesta</small></label><br>
		<textarea name="" id="1" cols="30" rows="5" class="form-control respuesta" placeholder="Ingrese su respuesta" maxlength="250" onkeydown="contarCaracteres(this.id)" onkeyup="contarCaracteres(this.id)" onblur="contarCaracteres(this.id)"></textarea>
		<div class="caracteres"><p><small>0 / 250</small></p></div><br><br>


		<label class="soft"><small>Pregunta 3</small></label><br>
		<label>¿Nivel de complejidad del sistema?</label><br><br>
		<div class='rating-stars text-center'>
		    <ul id='stars'>
		      <li class='star' title='Muy malo' data-value='1'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Malo' data-value='2'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Regular' data-value='3'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Bueno' data-value='4'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		      <li class='star' title='Muy bueno' data-value='5'>
		        <i class='fa fa-star fa-fw'></i>
		      </li>
		    </ul>
	  	</div><br>
		<label class="soft"><small>Respuesta</small></label><br>
		<textarea name="" id="2" cols="30" rows="5" class="form-control respuesta" placeholder="Ingrese su respuesta" maxlength="250" onkeydown="contarCaracteres(this.id)" onkeyup="contarCaracteres(this.id)" onblur="contarCaracteres(this.id)"></textarea>
		<div class="caracteres"><p><small>0 / 250</small></p></div><br><br>
		



		<section>
				<label class="soft"><small>Pregunta 4</small></label><br>
				<label>Ordene prioridades: Mejoras</label><br>
				<label><small>Haga click y arrastre los elementos a su ubicacion deseada</small></label><br><br>
				<div class="">
					<ul class="numeracion">
						<li><p>1</p></li>
						<li><p>2</p></li>
						<li><p>3</p></li>
						<li><p>4</p></li>
						<li><p>5</p></li>
						<li><p>6</p></li>
					</ul>
				</div>
				<div class="">
					<ul class="sortable list">
						<li><img class="img-drag" src="img/drag1.png"><p>Tiempo de Respuesta del Sistema</p></li>
						<li><img class="img-drag" src="img/drag1.png"><p>Mejora de la Interfaz</p></li>
						<li><img class="img-drag" src="img/drag1.png"><p>Atención al Usuario</p></li>
						<li><img class="img-drag" src="img/drag1.png"><p>Mejora de las Capacitaciones</p></li>
						<li><img class="img-drag" src="img/drag1.png"><p>Sistema mas Intuitivo</p></li>
						<li><img class="img-drag" src="img/drag1.png"><p>Versión Movil</p></li>
					</ul>
				</div>
		</section>

 
		<label class="soft"><small>Pregunta 5</small></label><br>
		<label>Respuesta libre</label><br>
		<label class="soft"><small>Respuesta</small></label><br>
		<textarea name="" id="3" cols="30" rows="7" class="form-control respuesta-libre" placeholder="Ingrese su respuesta" maxlength="2500" onkeydown="contarCaracteres2500()" onkeyup="contarCaracteres2500()" onblur="contarCaracteres2500()"></textarea>
		<div class="caracteres caracteres-libre"><p><small>0 / 2500</small></p></div><br><br> 



		<input type="submit" value="Enviar" class="btn-encuesta">
	</fieldset>
</form>


	<script>
		$(function() {
			$('.sortable').sortable();
			/*$('.handles').sortable({
				handle: 'span'
			});
			$('.connected').sortable({
				connectWith: '.connected'
			});*/
			$('.exclude').sortable({
				items: ':not(.disabled)'
			});
		});
	</script>


