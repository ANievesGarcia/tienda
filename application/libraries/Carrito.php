<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito
{
	//private $carrito = array();

	function __construct()
	{
		if(!get_instance()->session->userdata("basket")) get_instance()->session->set_userdata("basket", array());
	}

	public function add($item)
	{
		$carrito = get_instance()->session->userdata("basket");
		$carrito[$item["id_producto"]] = $item;
		get_instance()->session->set_userdata("basket", $carrito);
	}

	public function delete($id_producto)
	{
		$carrito = get_instance()->session->userdata("basket");
		unset($carrito[$id_producto]);
		get_instance()->session->set_userdata("basket", $carrito);
	}

	public function update($id_producto, $cantidad)
	{
		$carrito = get_instance()->session->userdata("basket");
		$carrito[$id_producto]["cantidad"] = $cantidad;
		get_instance()->session->set_userdata("basket", $carrito);
	}

	public function show()
	{
		print_r(get_instance()->session->userdata("basket"));
	}

	public function get_carrito()
	{
		return get_instance()->session->userdata("basket");
	}

	public function delete_carrito()
	{
		get_instance()->session->unset_userdata("basket", $carrito);
	}

	public function get_total()
	{
		if(!get_instance()->session->userdata("basket")) return 0;
		
		$total = 0;

		$carrito = get_instance()->session->userdata("basket");

		foreach ($carrito as $item) {
			$total += ($item["precio"] * $item["cantidad"]);
		}

		return $total;
	}


	public function get_numero_items()
	{
		if(!get_instance()->session->userdata("basket")) return 0;
		
		$items = 0;

		$carrito = get_instance()->session->userdata("basket");

		foreach ($carrito as $item) {
			$items += $item["cantidad"];
		}

		return $items;
	}


}