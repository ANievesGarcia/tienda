
	<!-- Body -->
	
	<div class="row">
		
		<div class="span12">
		
			<h1>Departamento de hombres</h1>
		
		</div>
		
	</div>

	<!-- Product Listing -->
	
	<div class="row">
		<?php foreach($hombres as $producto): ?>
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
		
		
	
	<div class="row">
		<div class="span12">
			<div class="pagination">
			  <ul>
			  	<?php if($paginaActual != 1): ?>
			  		<li><a href="<?php echo base_url(); ?>principal/hombres/<?php echo $paginaActual-1;?>">Anterior</a></li>
				<?php endif ?>
				
			    <?php for ($i=1;$i<=$paginas;$i++): ?>
			   		 <li><a href="<?php echo base_url(); ?>principal/hombres/<?php echo $i;?>"><?php echo $i;?></a></li>
			    <?php endfor ?>
			    <?php if($paginaActual != $paginas): ?>
					<li><a href="<?php echo base_url(); ?>principal/hombres/<?php echo $paginaActual+1;?>">Siguiente</a></li>
				<?php endif ?>
			  </ul>
			</div>
		</div>
	</div>

	<script>function formSubmit(id)
{
document.getElementById(id).submit();
}</script>
