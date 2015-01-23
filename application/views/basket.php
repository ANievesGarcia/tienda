
	<!-- Body -->
	<script src="<?php echo base_url();?>media/js/update_carrito.js"></script>


	<div class="row">
		
		<div class="span12">
		
			<h1>Your Basket</h1>
		
		</div>
		
	</div>

	<!-- Basket -->
	
	<div class="row">
	
		<div class="span12">
			
			<table class="basket-table">
				<?php if($NumeroItems > 0): ?>
				<thead>
					<tr>
						<th colspan="2">Item</th>
						<th>Cantidad</th>
						<th></th>
						<th>Precio</th>
						<th colspan="2">Total</th>
					</tr>
				</thead>
				<tbody>
				
					<?php foreach($items as $item): ?>
					<tr>
						<td class="image">
							<a href="product.html">
								<img src="<?php echo base_url();?>media/img/<?php echo $item['imagen']; ?>" alt="Ibiza Lips" />
							</a>
						</td>

						<td class="title">
							<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $item["id_producto"]; ?>">
								<?php echo $item["nombre"]; ?>
							</a>
						</td>

						<td class="qty">
							<input type="number" id="update_cantidad_<?php echo $item["id_producto"]; ?>"  
							value="<?php echo $item["cantidad"]; ?>" min="1" max="100">
					    </td>
					    <td class="remove">
					    	<?php echo anchor('#', img(base_url() .'media/img/update.png'),
					    array('class' => 'actualizar_item','title'=>'Actualiza item','data-idprod' => $item["id_producto"])); ?>
						</td>

						

						<td class="price">
							$<?php echo number_format($item["precio"], 2); ?>
						</td>

						<td class="total">$<?php echo number_format(($item["precio"] * $item["cantidad"]), 2); ?></td>
						<td class="remove"><?php echo anchor('principal/delete/' . $item["id_producto"], img(base_url() .'media/img/delete.png'), 
						'title="Quitar item"'); ?></td>
					</tr>
				<?php endforeach; ?>

			<?php else: ?>
			
			<div class="alert alert-danger" style="text-align:center;width: 80%;margin:auto;">
						El carrito esta vacio
			</div>
			
			
	
			<?php endif; ?>			
				</tbody>
			</table>
			
			<div class="clearfix">
			
			<p class="basket-total"><span>Total</span>$<?php echo number_format($total,2); ?></p>

			</div>
			
			<p class="actions">
				<a class="btn btn-blank" href="<?php echo base_url(); ?>principal/">Continuar Comprando</a>
					
			<a  class="btn btn-danger vaciar" href="">
					Vaciar Carrito
			</a>
			<a href="<?php echo base_url(); ?>principal/detalle_pedido" class="btn btn-success">Finalizar la compra</a>
			</p>
			
		</div>
	
	</div>
	
	<!-- Related Products -->
	
	<div class="row">
		
		<?php  if(!(empty($aleatorios))):?>
		<div class="row">
		
		<div class="span12">
		
			<h2>Tal vez este buscando..</h2>
		
		</div>
		
	</div>

		<?php foreach($aleatorios as $aleatorio): ?>
		<div class="span4 product-listing">
		
			<p class="title">
					<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $aleatorio->id; ?>">
					<?php echo $aleatorio->nombre ?>
					</a>
			</p>
			
			<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $aleatorio->id; ?>" 
					title="Ver detalle de playera">
					<img class="image" src="<?php echo base_url(); ?>media/img/<?php echo $aleatorio->imagen; ?>" >

			</a>
			
			<p class="price">
					$<?php echo $aleatorio->precio ?>
					<a class="btn btn-addcart btn-primary" <?php echo "onclick=formSubmit(".$aleatorio->id.");" ?>>
					<span class="entypo cart"></span>
					</a>
					<a class="btn btn-view btn-grey" href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $aleatorio->id; ?>"><span class="entypo search"></span></a>
			</p>

			<?php 
				$attributes = array('id' => $aleatorio->id);

				echo form_open('principal/agregarCarrito',$attributes);
				echo form_fieldset();
				echo form_hidden('cantidad', 1);
				echo form_hidden('id_producto', $aleatorio->id);	
				echo form_hidden('nombre', $aleatorio->nombre);
				echo form_hidden('precio', $aleatorio->precio);
				echo form_hidden('imagen', $aleatorio->imagen);
				
				echo form_fieldset_close();
				echo form_close();
			?>
			
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
		
	</div>
	

	<script>
	var url_base = "http://masosports.hol.es/";
	$("a.vaciar").click(function(e) {
    e.preventDefault();
    bootbox.confirm("<center>¿Esta seguro que desea vaciar su carrito? <br></center>", function(confirmed) {
        if(confirmed==true)
        {
        window.location.href = url_base + "principal/vaciarCarrito/";
        }
    });
});

	function formSubmit(id)
{
document.getElementById(id).submit();
}

	</script>