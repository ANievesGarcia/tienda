	<div class="row">
		
		<div class="span12">
		
			<h1>Productos Recientes</h1>

		
		</div>
		
	</div>

		<!-- Body -->
	<?php if (isset($msg)): ?>
					<?php if($msg=="error_forgot"): ?>
		    		<script>bootbox.alert("La liga de recuperación es incorrecta");</script>

			    	<?php elseif($msg=="success_cambio_pass"): ?>
		    		<script>bootbox.alert("Se cambio su Password correctamente");</script>

		    		<?php elseif($msg=="error_activate"): ?>
		    		<script>bootbox.alert("La liga de activacion es incorrecta");</script>

		    		<?php elseif($msg=="activacion"): ?>
		    		<script>bootbox.alert("Se le envio un email con el proceso de activacion");</script>

		    		<?php elseif($msg=="error_activando_cuenta"): ?>
		    		<script>bootbox.alert("Se produjo un error al activar su cuenta");</script>

		    		<?php elseif($msg=="succ_activate"): ?>
		    		<script>bootbox.alert("!Felicidades! se activo su cuenta correctamente");</script>


		    		<?php elseif($msg=="no_activo"): ?>
		    		<script>bootbox.alert("El usuario no esta activo");</script>

		    		<?php elseif($msg=="success_actualizar_perfil"): ?>
		    		<script>bootbox.alert("Perfil actualizado correctamente");</script>


		    		<?php elseif($msg=="detalle_pedido_enviado"): ?>
		    		<script>bootbox.alert("Se le a enviado un email con el detalle de su pedido");</script>

		    		<?php  elseif ($msg=="agregadoCorrecto"): ?>
					<script>bootbox.alert("Se agrego correctamente el producto");</script>


					<?php  elseif ($msg=="error_modificar"): ?>
					<script>bootbox.alert("Error al modificar el producto");</script>

					<?php  elseif ($msg=="modificadoCorrectamente"): ?>
					<script>bootbox.alert("Se modifico correctamente el producto");</script>


					<?php  elseif ($msg=="errorEliminar"): ?>
					<script>bootbox.alert("Error al eliminar el producto");</script>

					<?php  elseif ($msg=="eliminaroCorrectamente"): ?>
					<script>bootbox.alert("Se elimino correctamente el producto");</script>

		    		<?php endif; ?>	


	<?php endif; ?>	

	<!-- Product Listing -->
	
	<div class="row">
		<?php foreach($recientes as $producto): ?>
			<div class="span4 product-listing">

				<p class="title">
					<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $producto->id; ?>">
					<?php echo $producto->nombre ?>
					</a>
				</p>
				<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $producto->id; ?>" 
					title="Ver detalle de playera">
					<img class="image" src="<?php echo base_url(); ?>media/img/<?php echo $producto->imagen; ?>" >

				</a>
				
				<p class="price">
					$<?php echo $producto->precio ?>
					<a class="btn btn-addcart btn-primary" <?php echo "onclick=formSubmit(".$producto->id.");" ?>>
					<span class="entypo cart"></span>
					</a>
					<a class="btn btn-view btn-grey" href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $producto->id; ?>"><span class="entypo search"></span></a>
				</p>

				<?php 
				$attributes = array('id' => $producto->id);

				echo form_open('principal/agregarCarrito',$attributes);
				echo form_fieldset();
				echo form_hidden('cantidad', 1);
				echo form_hidden('id_producto', $producto->id);	
				echo form_hidden('nombre', $producto->nombre);
				echo form_hidden('precio', $producto->precio);
				echo form_hidden('imagen', $producto->imagen);
				
				echo form_fieldset_close();
				echo form_close();
				?>
				
			</div>
		<?php endforeach; ?>		
		
	</div>

	<script>function formSubmit(id)
{
document.getElementById(id).submit();
}</script>

	
	