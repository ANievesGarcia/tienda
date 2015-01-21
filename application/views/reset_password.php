
	<!-- Login -->
	
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
			
				<h2>Reset Password</h2>

				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error_conexion"): ?>
						<script>bootbox.alert("Error de conexion");</script>
					<?php endif; ?>

				<?php endif; ?>					
				<?php echo form_open("login/restore_pass"); ?>
				
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
	