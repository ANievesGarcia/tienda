
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
			
				<h2>Agregar Productos</h2>
				<div id="respuesta"></div>

				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error_ingresar"): ?>
		    			<script>bootbox.alert("Error al ingresar un nuevo producto");</script>


		    		

		    		<?php elseif($msg=="error_subir_servidor"): ?>
		    		<script>bootbox.alert("Error al subir imagen a servidor");</script>					
					<?php endif; ?>


				<?php endif; ?>						
				<?php echo form_open_multipart("principal/agregarProducto"); ?>
				
					<p>
						<label for="nombre">Nombre <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'nombre',
		              				'id'    => 'nombre',
		              				'value' => set_value('nombre'),
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
				
					<p>
						<label for="cantidad">Cantidad Actual <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'cantidad',
		              				'id'    => 'cantidad',
		              				'value' => set_value('cantidad'),
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
				
					<p>
						<label for="categoria">Categoria<span class="mand">*</span></label>
						<?php
								$options = array(
				                  '1'  => 'Hombres',
				                  '2'    => 'Mujeres',
				                  
                				);
								echo form_dropdown('categoria', $options );
						?>
					</p>

					<p>
						<label for="precio">Precio x unidad<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'precio',
		              				'id'    => 'precio',
		              				'value' => set_value('precio'),
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>

					<p>
						<label for="precio_envio">Precio de envio<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'precio_envio',
		              				'id'    => 'precio_envio',
		              				'value' => set_value('precio_envio'),
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>

					<p>
						<label for="descripcion">Descripcion<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'descripcion',
		              				'id'    => 'descripcion',
		              				'value' => set_value('descripcion'),
              						'rows'        => '5',
		              				'required' => ''
		            		);
								echo form_textarea($data);
						?>
					</p>

					<input type="hidden" id="h1" name="hidden_nombre" />

					<p>
					    <label for="userfile">Imagen<span class="mand">*</span></label>
					    <input  id="image_nombre" onchange="traer_nombre()" type="file" name="userfile" size="20"  />

					 </p>
					
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Continuar</button>
						<button type="reset" class="btn btn-warning" value="Cancelar">Cancelar</button>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>


<script type="text/javascript">
function traer_nombre(){
	var nombre= document.getElementById("image_nombre").value;
	document.getElementById("h1").value= nombre;
}

</script>