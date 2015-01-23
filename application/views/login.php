
	<!-- Login -->
	
	<div class="row">
	
		<div class="span6 offset3">
			
			<div class="member-box">
				<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger">', '</div>'); ?>
				<?php echo validation_errors(); ?>
				<h2>Login</h2>
				<?php if (isset($msg)): ?>
		    		<?php if($msg=="error"): ?>
		    		<script>bootbox.alert("usuario/contraseña incorrecta");</script>
					<?php  elseif ($msg=="no_activo"): ?>
					<script>bootbox.alert("Usuario inactivo");</script>
					<?php endif; ?>
				<?php endif; ?>				
	

				<?php echo form_open("login/valida_usuario"); ?>
				<p>
						<label for="usuario">Email <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'usuario',
		              				'id'    => 'usuario',
		              				'value' => set_value('usuario'),
		              				'required' => '',
		              				'onkeyup' =>'this.value=cambiarMinusculas(this.value)'
		            		);
								echo form_input($data);
						?>
				</p>
				<p>
						<label for="password">Password <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'password',
									'id' 	=> 'password',
		              				'required' => ''
		            		);
								echo form_password($data);
								echo form_hidden('lugar', 'en_login');
						?>
				</p>
				<p class="buttons">
						<button class="btn btn-primary" type="submit">Continue</button>
						<?php echo anchor("login/olvidoPass", "¿Olvido su Pass?",array('class'=>'btn btn-blank')); ?>
				</p>

			<script>
			function cambiarMinusculas(texto){
				return texto.toLowerCase();
			}
			</script>

				

				
			</div>
			
		</div>
	
	</div>
	