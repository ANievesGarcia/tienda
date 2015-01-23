

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
					<?php endif; ?>


				<?php endif; ?>						
				<?php echo form_open("principal/actualizando_producto"); ?>
				
					<p>
						<label for="nombre">Nombre <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'nombre',
		              				'id'    => 'nombre',
		              				'value' => $producto->nombre,
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>

					<input type="hidden" name="id" value="<?php echo $producto -> id; ?>" />
				
					<p>
						<label for="cantidad">Cantidad Actual <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'cantidad',
		              				'id'    => 'cantidad',
		              				'value' => $producto->cantidad,
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
				
					<p>
						<label for="categoria">Categoria<span class="mand">*</span></label>
						<select name="categoria">
							<?php if ($producto->Categorias_id == 1): ?>
									<option value="1" selected>Hombres</option>
									<option value="2">Mujeres</option>	
							<?php else: ?>
		    						<option value="1" >Hombres</option>
									<option value="2" selected>Mujeres</option>				
							<?php endif; ?>
						</select>
					</p>

					<p>
						<label for="precio">Precio x unidad<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'precio',
		              				'id'    => 'precio',
		              				'value' => $producto->precio,
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
		              				'value' => $producto->costoEnvio,
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
		              				'value' => $producto->descripcion,
              						'rows'        => '5',
		              				'required' => ''
		            		);
								echo form_textarea($data);
						?>
					</p>


					<p>
					    <label for="imagen">Imagen<span class="mand">*</span></label>
					    <input type="file" name="imagen" value ="<?php echo $producto->imagen; ?>"  />
					 </p>

					
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Continuar</button>
						<button type="reset" class="btn btn-warning" value="Cancelar">Cancelar</button>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>
