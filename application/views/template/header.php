
<div class="span12">
			<!--Comprobamos si esta registrado en el sistema-->
			<?php if($this->session->userdata("usuario_logeado")): ?>
		    <?php $usuario = $this->session->userdata("usuario"); ?>
		    <ul class="top-nav">
		    	<li></li>
		    	<li><?php echo anchor("login/cambiarPass", "Cambiar Contraseña"); ?></li>
		    	<li><?php echo anchor("login/Perfil", "Modificar Perfil"); ?></li>
		    	<li><a class="confirm" href="">Cerrar Sesion</a></li>
			</ul>
			<!--Si no esta registrado-->
			<?php else: ?>
			<ul class="top-nav">
			<li><?php echo anchor("login/", "Login"); ?></li>
			<li><?php echo anchor("login/registrar", "Registrar"); ?></li>
			</ul>
			<?php endif; ?>			
</div>
	
	<!-- Header -->
	
	<div class="row">
	
		<div class="span4">
		
			<p class="logo">
				<span class="entypo globe"></span>TIENDA EN LINEA
			</p>
		
		</div>
	
		<div class="span4">
		
			<p class="strapline" style="text-align:center;">
				El mejor lugar para hacer tus compras<br />
				<span>
					<!--Comprobamos si esta registrado en el sistema-->
					<?php if(isset($usuario)): ?>
					<div class="alert alert-info" style="text-align:center;">
						Bienvenido <?php echo $usuario->nombre.' '.$usuario->apellidos; ?>
					</div>
					<?php else: ?>
					<div class="alert alert-info" style="text-align:center;">
						Bienvenido (Para comprar debe estar registrado)
					</div>
					<?php endif; ?>		

				</span>
			</p>
		
		</div>
	
		<div class="span4">
			
			<div class="row">
				
				<div class="span2 offset2 mini-basket">
					
					<p class="mini-basket-title"><span class="entypo cart"></span><?php echo anchor("principal/carrito", "Carrito"); ?></a></p>
					
					<div class="row">
						
						<div class="span1">
							<p class="mini-basket-summary">
								Precio<br />
								<span>$<?php echo number_format($total, 2); ?></span>
							</p>
						</div>
					
						<div class="span1">
							<p class="mini-basket-summary">
								Items<br />
								<span><?php echo $NumeroItems;?></span>
							</p>
						</div>
					
					</div>
					
				</div>
			
			</div>
			
		</div>
	
	</div>
	
	<!-- Menu -->

	<script>
	var url_base = "http://localhost/tienda2/";
	$("a.confirm").click(function(e) {
    e.preventDefault();
    bootbox.confirm("<center>¿Esta seguro que desea salir? <br> <strong>Su compra sera cancelada</strong></center>", function(confirmed) {
        if(confirmed==true)
        {
        window.location.href = url_base + "login/salir/";
        }
    });
});

	</script>