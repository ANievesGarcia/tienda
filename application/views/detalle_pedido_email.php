<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
</head>
<body>

	<style type="text/css">
		.contenido {
		    padding-left: 3cm;
		}

		.titulo {

			padding-bottom: 2.5cm;
		}
		.precio{
			padding-left: 7cm;	
		}


	</style>

	<div class="contenido">
			<h1 class="titulo"><center>Ficha de Deposito</center></h1>
			<p><font size="5">Banco:  </font>BBVA BANCOMER</p>
			<p><font size="5">Nombre:  </font>Masosports S.A de C.V </p>
			<p><font size="5">Cuenta:  </font>5675746348821</p>
			<p><font size="5">Referencia:  </font>756</p>

			<br><br>
			<table border="1" >
				<thead>
					<tr>
						<th>Item</th>
						<th>Imagen</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th >Total</th>
					</tr>
				</thead>
				<tbody>
				
					<?php foreach($items as $item): ?>
					<tr>
					
						<td class="title">
							<a href="<?php echo base_url(); ?>principal/detalle_producto/<?php echo $item["id_producto"]; ?>">
								<?php echo $item["nombre"]; ?>
							</a>
						</td>
						<td>
							

						</td>

						<td class="qty">
							<?php echo $item["cantidad"]; ?>
					    </td>

						<td class="price">
							$<?php echo number_format($item["precio"], 2); ?>
						</td>

						<td class="total">$<?php echo number_format(($item["precio"] * $item["cantidad"]), 2); ?></td>
					</tr>
				<?php endforeach; ?>




			
			</tbody>
			</table>
			<p class="precio"><span ><font size="3" color="red">Total</font>
								</span>$<?php echo number_format($total,2); ?></p>


				<em>Por favor no conteste este correo.</em>
</div>


</body>	
</html>

			









