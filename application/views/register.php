<!-- Login -->
	
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
			
				<h2>Registrar</h2>
				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error"): ?>
		    			<script>bootbox.alert("Error de conexion con BD");</script>

					<?php  elseif ($msg=="enviado"): ?>
						<script>bootbox.alert("Se ha enviado un correo con instrucciones para recuperar su Password");</script>
					
					<?php elseif($msg=="err_correo"): ?>
						<script>bootbox.alert("Error al enviar correo de activacion, intentelo mas tarde");</script>
		
					<?php endif; ?>

				<?php endif; ?>						
				<?php echo form_open("login/guardar_cuenta"); ?>
				
					<p>
						<label for="email">Email<span class="mand">*</span></label>
						<?php
							$data = array(
		              		'name'  => 'email',
		              		'id'    => 'email',
		              		'value' => set_value('email'),
		              		'required' => ''
		            	);
					echo form_input($data);
				?>
					</p>

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
						<label for="Apellidos">Apellidos <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'apellidos',
		              				'id'    => 'apellidos',
		              				'value' => set_value('apellidos'),
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
		              				'value' => set_value('direccion'),
		              				'required' => ''
		            		);
								echo form_input($data);
						?>
					</p>
					<p>
						<label for="pass">Contraseña<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'pass',
		              				'id'    => 'pass',
		              				'value' => set_value('pass'),
		              				'required' => ''
		            		);
								echo form_password($data);
								echo form_hidden('lugar', 'en_registrar');
						?>

					</p>
					<p>
						<label for="pass2">Confirma Contraseña<span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'pass2',
		              				'id'    => 'pass2',
		              				#'value' => set_value('pass2'),
		              				'required' => ''
		            		);
								echo form_password($data);
						?>
					</p>
					
				
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Continue</button>
						<button type="reset" class="btn btn-warning" value="Cancelar">Cancelar</button>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>
