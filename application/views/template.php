<?php
#if(isset($producto) && $producto == FALSE) show_404();
#para detalle producto.

$this->load->view("template/head");
$this->load->view("template/header");
$this->load->view("template/menu");
$this->load->view("$content");
$this->load->view("template/foot");
?>