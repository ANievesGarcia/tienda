var url_base = "http://localhost/tienda2/";
//var url_base = "http://lab.linkdesigns.com/tienda/";

$("document").ready(function(){
	// Actualizar cantidad de un item
	$("body").on("click", ".actualizar_item", function(e){
		e.preventDefault();
		var id_producto = $(this).data("idprod");
		var cantidad = $("#update_cantidad_" + id_producto).val();

		window.location.href = url_base + "principal/update/" + id_producto + "/" + cantidad;
	});
});