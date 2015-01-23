
	<!-- Checkout -->
	
	<div class="row">
	
		<div class="span12">
			
			<div class="checkout-steps clearfix">
				<p class="step step-active">
					<span class="entypo chevron-right"></span>
					1. Login/Registrar
				</p>
				<p class="step">
					<span class="entypo chevron-right"></span>
					2. Detalles
				</p>
			
				<p class="step">
					<span class="entypo chevron-right"></span>
					3. Forma de Pago
				</p>
			
				<p class="step">
					4. Confirmación
				</p>
			
			</div>
			
		</div>
		
	</div>
	
	<div class="row">
		<?php $this->form_validation->set_error_delimiters('<div  class="alert alert-danger" 
		style="width:80%; margin: 0 auto;margin-bottom: 1%;text-align:center;">', '</div>'); ?>
		<?php echo validation_errors(); ?>
		<div class="span6">
			
			<div class="checkout-box">
			
				<h2>Login</h2>
				<p>Ingrese sus datos si ya cuenta con una cuenta</p>
				<?php if (isset($msg)): ?>
		    		<?php if($msg=="datos_incorrectos"): ?>
		    		<script>bootbox.alert("usuario/contraseña incorrecta");</script>
					<?php  elseif ($msg=="no_activo"): ?>
					<script>bootbox.alert("Usuario inactivo");</script>
					<?php elseif($msg=="err_correo"): ?>
						<script>bootbox.alert("Error al enviar correo de activacion, intentelo mas tarde");</script>
					<?php elseif($msg=="error_base"): ?>
		    			<script>bootbox.alert("Error de conexion con BD");</script>
					<?php endif; ?>
				<?php endif; ?>				
	
				<?php 
				$attributes = array('id' => 'login');
				echo form_open("login/valida_usuario",$attributes); ?>
				<p>
						<label for="usuario">Email <span class="mand">*</span></label>
						<?php
								$data = array(
		              				'name'  => 'usuario',
		              				'id'    => 'usuario',
		              				'value' => set_value('usuario'),
		              				'required' => '',
		              				'onkeyup' =>'this.value=cambiarMinusculas(this.value)',
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
								echo form_hidden('lugar', 'en_carrito');
								echo form_close();
						?>


				</p>
				<p class="buttons">
						<button class="btn btn-primary"  onclick="formSubmit('login')">Continue</button>
						<?php echo anchor("login/olvidoPass", "¿Olvido su Pass?",array('class'=>'btn btn-blank')); ?>
				</p>

			<script>
			function cambiarMinusculas(texto){
				return texto.toLowerCase();
			}
			</script>	
				
			</div>
			
		</div>
	
		<div class="span6">
			
			<div class="checkout-box">
			
				<h2>Registrar</h2>
				<p>Si no tiene cuenta regístrese ahora</p>
				<?php if (isset($msg)): ?>
					<?php if($msg=="error"): ?>
		    			<script>bootbox.alert("Error de conexion con BD");</script>

					<?php  elseif ($msg=="enviado"): ?>
						<script>bootbox.alert("Se ha enviado un correo con instrucciones para recuperar su Password");</script>
					
					<?php elseif($msg=="err_correo"): ?>
						<script>bootbox.alert("Error al enviar correo de activacion, intentelo mas tarde");</script>
		
					<?php endif; ?>

				<?php endif; ?>						
				<?php 
				$attributes = array('id' => 'registrar');
				echo form_open("login/guardar_cuenta",$attributes); ?>				
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
								echo form_hidden('lugar', 'en_carrito');
						?>
					</p>
					
				
					<p class="buttons">
						<button class="btn btn-primary" onclick="formSubmit('registrar');">Continue</button>
						<button type="reset" class="btn btn-warning" value="Cancelar">Cancelar</button>
						<?php
						echo form_close();
						?>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
	</div>

	<script>
function formSubmit(id)
{
	document.getElementById(id).submit();
}
</script>
