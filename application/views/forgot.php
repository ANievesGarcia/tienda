
	<!-- Login -->
	
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
			
				<h2>Reset Password</h2>

				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error"): ?>
		    			<script>bootbox.alert("No existe usuario con este email");</script>

					<?php  elseif ($msg=="enviado"): ?>
						<script>bootbox.alert("Se ha enviado un correo con instrucciones para recuperar su Password");</script>
					
					<?php elseif($msg=="err_correo"): ?>
						<script>bootbox.alert("Error al enviar correo, intentelo mas tarde");</script>
		

					<?php elseif($msg=="error_conexion"): ?>
						<script>bootbox.alert("Error de conexion");</script>
					<?php endif; ?>

				<?php endif; ?>				
				<?php echo form_open("login/correoPass"); ?>
				
				<p>
						<label for="email">Email<span class="mand">*</span></label>
						<?php
							$data = array(
		              		'name'  => 'email',
		              		'id'    => 'email',
		 
		              		'required' => ''
		            	);
					echo form_input($data);
						?>
				</p>

			
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Reset Password</button>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>
	