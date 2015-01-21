	<div class="row">
		
		<div class="span12">
		
			<ul class="main-nav clearfix">
				<?php foreach(get_menu_opciones() as $menu=>$value): ?>
			<?php if($menu_activo == $menu): ?>
				<li class="active"><?php echo anchor("principal/" . $menu, $value); ?></li>
			<?php else: ?>
				<li><?php echo anchor("principal/" . $menu, $value); ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php if($this->session->userdata("usuario_root")): ?>
		    	<li><?php echo anchor("principal/Agregar" , "Agregar Productos"); ?></li>
		 <?php endif; ?>	

			</ul>


		
		</div>
		
	</div>
