
	<!-- Body -->
	
	<div class="row">
		
		<div class="span12">
		
			<h1><?php echo $producto->nombre ?></h1>
		
		</div>
		
	</div>

	<!-- Product Detail -->
	
	<div class="row">
	
		<div class="span8">
		
			<img class="product-image" src="<?php echo base_url();?>media/img/<?php echo $producto->imagen; ?>" alt="Ibiza Lips" />
			
			<div class="row">
			
				<div class="span2">
					<a href=""><img class="product-thumb" src="<?php echo base_url();?>media/img/<?php echo  $producto->imagen; ?>" alt="Ibiza Lips" /></a>
				</div>
			
				<div class="span2">
					<a href=""><img class="product-thumb" src="<?php echo base_url();?>media/img/<?php echo $producto->imagen; ?>" alt="Ibiza Lips" /></a>
				</div>
			
			</div>
			
		</div>
		
		<div class="span4">
		
			<div class="add-basket-box clearfix">
				
				<img src="<?php echo base_url();?>media/img/<?php echo $producto->imagen; ?>" alt="Ibiza Lips" />
				
				<p>	<?php echo $producto->nombre ?><br /><span>$<?php echo $producto->precio; ?></span></p>
				
				<?php 
				$attributes = array('id' => 'myform');

				echo form_open('principal/agregarCarrito',$attributes);
				echo form_fieldset();
				echo form_hidden('cantidad', 1);
				echo form_hidden('id_producto', $producto->id);
				echo form_hidden('nombre', $producto->nombre);
				echo form_hidden('precio', $producto->precio);
				echo form_hidden('imagen', $producto->imagen);
				echo form_hidden('id_eliminar', $producto->id);
				echo form_fieldset_close();
				echo form_close();
			?>
				<a class="btn btn-addcart btn-primary" onclick="formSubmit()">
					<span class="entypo cart"></span>
				</a> 

				<?php if($this->session->userdata("usuario_root")): ?>
		    		<br><br>
				<a class="btn btn-addcart btn-primary" 
				href="<?php echo base_url(); ?>principal/modifica_producto/<?php echo $producto->id; ?>"
				>
					<span class="entypo tools"></span>
				</a>
					<br><br>
				<a class="btn btn-addcart btn-primary confirm_delete">
					<span class="entypo trash"></span>
				</a>

		 		<?php endif; ?>	


			
				
			</div>
			<h3>Descipción</h3>
			<p><?php echo $producto->descripcion; ?></p>
			
			<h3>Existencia</h3>
			<?php if (($producto->cantidad) > 0 ): ?>
			<p>El producto se encuentra en existencia</p>
			<?php else: ?>
			<p>Este producto se encuentra agotado</p>
			<?php endif; ?>
			
			<h3>Envio</h3>
			<?php if (($producto->costoEnvio) > 0 ): ?>
			<p>Disponible con costo de $ <?php echo $producto->costoEnvio; ?></p>
			<?php else: ?>
			<p>Entrega gratuita disponible para este artículo</p>
			<?php endif; ?>

		</div>
	
	</div>
	

	<!-- SI NO HAY PRODUCTOS RELACIONADOS QUITA EL BLOQUE -->
	
	<div class="row">

		<?php  if(!(empty($relacionados))):?>
		<div class="row">
		
		<div class="span12">
		
			<h2>Productos Relacionados</h2>
		
		</div>
		
	</div>

		<?php foreach($relacionados as $relacionado): ?>
		<div class="span4 product-listing">
		
			<p class="title">
					<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $relacionado->id; ?>">
					<?php echo $relacionado->nombre ?>
					</a>
			</p>
			
			<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $relacionado->id; ?>" 
					title="Ver detalle de playera">
					<img class="image" src="<?php echo base_url(); ?>media/img/<?php echo $relacionado->imagen; ?>" >

			</a>
			
			<p class="price">
					$<?php echo $relacionado->precio ?>
					<a class="btn btn-addcart btn-primary" <?php echo "onclick=formSubmit2(".$relacionado->id.");" ?>>
					<span class="entypo cart"></span>
					</a>
					<a class="btn btn-view btn-grey" href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $relacionado->id; ?>"><span class="entypo search"></span></a>
			</p>

			<?php 
				$attributes = array('id' => $relacionado->id);

				echo form_open('principal/agregarCarrito',$attributes);
				echo form_fieldset();
				echo form_hidden('cantidad', 1);
				echo form_hidden('id_producto', $relacionado->id);	
				echo form_hidden('nombre', $relacionado->nombre);
				echo form_hidden('precio', $relacionado->precio);
				echo form_hidden('imagen', $relacionado->imagen);
				
				echo form_fieldset_close();
				echo form_close();
			?>
			
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
		
	</div>
<script>function formSubmit()
{
document.getElementById("myform").submit();
}
function formSubmit2(id)
{
document.getElementById(id).submit();
}


var url_base = "http://localhost/tienda2/";
var valor = document.getElementsByName("id_eliminar")[0].value;
	$("a.confirm_delete").click(function(e) {
		e.preventDefault();
    	 bootbox.confirm("<center>¿Esta seguro que desea eliminar el producto? <br> <strong>La accion no puede ser revertida</strong></center>", 
    	function(confirmed) {
	        if(confirmed==true)
	        {
	        window.location.href = url_base + "principal/elimina_producto/"+valor;
	        }
    });
});



</script>
	