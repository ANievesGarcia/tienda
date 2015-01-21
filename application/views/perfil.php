<!-- Login -->
<script type="text/javascript">
 $(function() { //En cuanto esté listo el DOM, deshabilitamos la lista de municipios
 $('select#municipio').attr('disabled',true);
 });

 function activateEntidad()
 {
	 var estado_id = $('select#estado').val(); //Obtenemos el id del estado seleccionado
	 if(estado_id!="ninguno")
	 {
	 	$.ajax({
	 type: 'POST',
	 url: '<?php echo base_url(); ?>login/cargarMun', //Realizamos la peticion al controlador principal/cargarMun
	 data: 'estado_id='+estado_id, //Pasaremos por parámetro POST el id del torneo
	 dataType: "text",
     cache:false,
	 success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
	 //Activar y Rellenar el select de Municipios
	$('select#municipio').attr('disabled',false).html(resp); //Con el método ".html()" incluimos el código html devuelto por AJAX
	//$('#respuesta').html(resp);
	 }
	 });

	 }
	 else{
	 	$('select#municipio').empty();
	 	 $('select#municipio').attr('disabled',true);

	 }
	 
 }

 </script>
	
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
			
				<h2>Modificar Perfil</h2>
				<div id="respuesta"></div>

				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error_actualizar_perfil"): ?>
		    			<script>bootbox.alert("Error al actualizar el perfil");</script>					
					<?php endif; ?>

				<?php endif; ?>						
				<?php echo form_open("login/actualiza_perfil"); ?>
				
					<p>
						<label for="nombre">Nombre <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'nombre',
		              				'id'    => 'nombre',
		              				'value' => $usuario->nombre,
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
				
					<p>
						<label for="Apellidos">Apellidos <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'apellidos',
		              				'id'    => 'apellidos',
		              				'value' => $usuario->apellidos,
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
				
					<p>
						<label for="direccion">Dirección<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'direccion',
		              				'id'    => 'direccion',
		              				'value' => $usuario->direccion,
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>

					<p>
						<label for="estado">Estado<span class="mand">*</span></label>
						<select id="estado" name="estado" onchange="activateEntidad()">
							<option value='ninguno' >Seleccione un estado</option>
						 <?php
						 foreach($entidades as $entidad)
						 {
						 	echo "<option value='$entidad->cv_entidad'>$entidad->nombre</option>";
						 }
						 ?>
						</select>
					</p>
					<p>
						<label for="municipio">Municipio<span class="mand">*</span></label>
						<select id="municipio" name="municipio">
						</select>
					</p>
					
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Continue</button>
						<button type="reset" class="btn btn-warning" value="Cancelar" 
						onclick="location.href='<?php echo base_url();?>principal/index'">Cancelar</button>

					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>
