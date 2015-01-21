
	<div class="row">

<?php if (isset($msg)): ?>
					<?php if($msg=="error_detalle_pedido_correo"): ?>
		    		<script>bootbox.alert("Error al enviar el detalle del pedido a su email");</script>
					


		    		<?php elseif($msg=="error_bd"): ?>
		    		<script>bootbox.alert("Error inesperado con la BD");</script>
					<?php endif; ?>	
<?php endif; ?>	



		
	
		<div class="span12">
			
			<div class="checkout-steps clearfix">
	
				<p class="step  step-active">
					<span class="entypo chevron-right"></span>
					1. Detalles
				</p>
			
				<p class="step">
					<span class="entypo chevron-right"></span>
					2. Forma de Pago
				</p>
			
				<p class="step">
					3. Confirmación
				</p>
			
			</div>
			
		</div>
		
	</div>
	

	<!-- Detalle Pedido -->
	<div class="row">
		<div class="span0">
		</div>
		<div class="span4" >
			<h2>Datos del Cliente</h2>
			<div class="row-fluid" style="background-color:white; border-color: gray; border: solid 1px #000000;">
        		<div class="span2" >
		    		<img src="<?php echo base_url();?>media/img/avatar.jpeg" class="img-circle">
        		</div>
		        <div class="span8">
		            <h3><?php echo $usuario->nombre." ".$usuario->apellidos; ?></h3>
		            <h6>Email: <?php echo $usuario->email; ?></h6>
		            <h6>Dirección: <?php echo $usuario->direccion; ?></h6>
		            <h6>Estado: <?php echo $estado->nombre; ?></h6>
		            <h6>Municipio: <?php echo $municipio->nombre; ?></h6>
		            <h6>Fecha de Registro: 27/02/2013</h6>

		        </div>
			</div>
		</div>

		<div class="span7">
			<h2>Datos del Pedido</h2>
			<table class="basket-table">
				<thead>
					<tr>
						<th colspan="2">Item</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th colspan="2">Total</th>
					</tr>
				</thead>
				<tbody>
				
					<?php foreach($items as $item): ?>
					<tr>
						<td class="image">
								<img src="<?php echo base_url();?>media/img/<?php echo $item['imagen']; ?>" alt="Ibiza Lips" />
						</td>

						<td class="title">
								<?php echo $item["nombre"]; ?>
						</td>

						<td class="qty">
							<?php echo $item["cantidad"];?>
					    </td>
						<td class="price">
							$<?php echo number_format($item["precio"], 2); ?>
						</td>

						<td class="total">$<?php echo number_format(($item["precio"] * $item["cantidad"]), 2); ?></td>
					</tr>
				<?php endforeach; ?>

				</tbody>
			</table>
			
			<div class="clearfix">
			
			<p class="basket-total"><span>Total</span>$<?php echo number_format($total,2); ?></p>

			</div>
			
			<p class="actions">		
		
			<a href="<?php echo base_url(); ?>principal/detalle_pedido_formaPgo" class="btn btn-success">Continuar</a>
			</p>
			
		</div>
	
	</div>
	
	