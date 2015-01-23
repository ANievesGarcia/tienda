<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("Carrito");
		#si esta sesion no contiene una variable carrito la crea
		if(!$this->session->userdata("basket")) $this->session->set_userdata("basket", array());
		
	}

	public function index()
	{

		$data["menu_activo"] = "index";
		$data["content"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
		#print_r($data["recientes"]); 
		$this->load->view("template", $data);
	}

	/*public function hombres()
	{
		$data["menu_activo"] = "hombres";
		$data["content"] = "products-men";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["hombres"]= $this->Tienda_model->get_productos_categoria(1);
		$this->load->view("template", $data);
	}*/

	public function hombres($pagina)
	{
		$data["menu_activo"] = "hombres";
		$data["content"] = "products-men";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		
		#Obtiene los productos de la categoria mujeres
		$todasMujeres= $this->Tienda_model->get_productos_categoria(1);
		#Divide el arreglo en secciones de 6 elementos
		$tres_mujeres=array_chunk($todasMujeres, 6);
		#Envia a la vista los elementos correspondientes a la pagina
		$data["hombres"]=$tres_mujeres[$pagina-1];
		#Numero de pagina actual 
		$data['paginaActual']=$pagina;
		#Numero total de paginas
		$data['paginas']=sizeof($tres_mujeres);

		$this->load->view("template", $data);
	}

    public function mujeres($pagina)
	{
		$data["menu_activo"] = "mujeres";
		$data["content"] = "products-women";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		
		#Obtiene los productos de la categoria mujeres
		$todasMujeres= $this->Tienda_model->get_productos_categoria(2);
		#Divide el arreglo en secciones de 6 elementos
		$tres_mujeres=array_chunk($todasMujeres, 6);
		#Envia a la vista los elementos correspondientes a la pagina
		$data["mujeres"]=$tres_mujeres[$pagina-1];
		#Numero de pagina actual 
		$data['paginaActual']=$pagina;
		#Numero total de paginas
		$data['paginas']=sizeof($tres_mujeres);

		$this->load->view("template", $data);
	}


	public function detalle_producto($id)
	{
		$id = (int) $id;
		if(empty($id) || $id < 0) redirect("principal");

		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["producto"] = $this->Tienda_model->get_producto($id);
	    if(!(empty($data["producto"]))){
	    	if(($data["producto"]->Categorias_id)==1) $data["menu_activo"] = "hombres";
	    	else if(($data["producto"]->Categorias_id)==2) $data["menu_activo"] = "mujeres";
	    $data["relacionados"] = $this->Tienda_model->get_relacionados($data["producto"]);
		$data["content"] = "product";
	    $this->load->view("template", $data); 
	    }
	    else{
	    	redirect("principal");
	    }  
	}

	public function agregarCarrito(){
		$this->carrito->add($this->input->post());
		redirect("principal/carrito");
	}

	public function carrito()
	{
		$data["menu_activo"] = "index";
		$data["content"] = "basket";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["items"] = $this->carrito->get_carrito();
		$data["aleatorios"] = $this->Tienda_model->get_productos_aleatorios(3);
		$this->load->view("template", $data);
	}

	public function delete($id_producto)
	{
		$this->carrito->delete($id_producto);
		redirect("principal/carrito");
	}

	public function update($id_producto, $cantidad)
	{
		$this->carrito->update($id_producto, $cantidad);
		redirect("principal/carrito");
	}

	public function vaciarCarrito()
	{
		$this->carrito->delete_carrito();
		redirect("principal/");
	}
	public function detalle_pedido()
	{
		if(!$this->session->userdata("basket")) redirect("principal/");

		//si no existe la variable usuario logeado
		if(!$this->session->userdata("usuario_logeado")){
			$data["menu_activo"] = "index";
			$data["content"] = "detalle_pedido_login";
			$data["total"] = $this->carrito->get_total();
			$data["NumeroItems"] = $this->carrito->get_numero_items();
			$data["items"] = $this->carrito->get_carrito();
			$this->load->view("template", $data);
		}
		else{
			$data["estado"] = $this->Clientes_model->get_estado($this->session->userdata("usuario")->email);
			$data["municipio"] = $this->Clientes_model->get_municipio($this->session->userdata("usuario")->email);
			$data["menu_activo"] = "index";
			$data['usuario'] =$this->session->userdata("usuario");
			$data["total"] = $this->carrito->get_total();
			$data["NumeroItems"] = $this->carrito->get_numero_items();
			$data["items"] = $this->carrito->get_carrito();
			$data["content"] = "detalle_pedido_pago";
			$this->load->view("template", $data);
		}
	}
	public function detalle_pedido_formaPgo()
	{
		if(!$this->session->userdata("basket")) redirect("principal/");

		if(!$this->session->userdata("usuario_logeado")){
			$data["menu_activo"] = "index";
			$data["content"] = "detalle_pedido_login";
			$data["total"] = $this->carrito->get_total();
			$data["NumeroItems"] = $this->carrito->get_numero_items();
			$data["items"] = $this->carrito->get_carrito();
			$this->load->view("template", $data);
		}
		else{
			$data["menu_activo"] = "index";
			$data['usuario'] =$this->session->userdata("usuario");
			$data["total"] = $this->carrito->get_total();
			$data["NumeroItems"] = $this->carrito->get_numero_items();
			$data["items"] = $this->carrito->get_carrito();
			$data["content"] = "detalle_pedido_forma_pago";
			$this->load->view("template", $data);
		}
	}


 	public function reporte()
 	{
 	$this->load->helper(array('dompdf', 'file'));
     // page info here, db calls, etc.     
	$data["total"] = $this->carrito->get_total();
	$data["NumeroItems"] = $this->carrito->get_numero_items();
	$data["items"] = $this->carrito->get_carrito();
     $html = $this->load->view('pdf_prueba', $data, true);
     
     pdf_create($html, 'filename');
 	}
 
 	public function enviar_pedido(){
 		//print_r($this->input->post());
 		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["items"] = $this->carrito->get_carrito();
		$data["estado"] = $this->Clientes_model->get_estado($this->session->userdata("usuario")->email);
		$data["municipio"] = $this->Clientes_model->get_municipio($this->session->userdata("usuario")->email);
		$data["menu_activo"] = "index";
		$data['usuario'] =$this->session->userdata("usuario");
		$data["content"] = "detalle_pedido_pago";

		//Obtengo los datos de la tarjeta de credito
		$nombre = trim(strip_tags($this->input->post("nombre")));
		$p_digitos = trim(strip_tags($this->input->post("p_digitos")));
		$s_digitos = trim(strip_tags($this->input->post("s_digitos")));
		$t_digitos = trim(strip_tags($this->input->post("t_digitos")));
		$c_digitos = trim(strip_tags($this->input->post("c_digitos")));
		$fecha_vencimiento = trim(strip_tags($this->input->post("fecha_vencimiento")));
		$ano_vencimiento = trim(strip_tags($this->input->post("ano_vencimiento")));
		$card_cvv = trim(strip_tags($this->input->post("card_cvv")));
		$usuario=$this->session->userdata("usuario");

// Agregamos el pedido a la bd
//Se agrega solo los datos de la tarjeta y el monto del pedido
		$datos = array(
			"titular" => $nombre,
			"fecha" => date("Y-m-d"),
			"total" => $data["total"],
			"no_tarjeta" => $p_digitos.$s_digitos.$t_digitos.$c_digitos,
			"fecha_vencimiento" => $fecha_vencimiento,
			"ano_vencimiento" => $ano_vencimiento,
			"card_cvv" => $card_cvv,
			"cliente" =>$usuario->email
		);
		$basket=$this->session->userdata("basket");
		$id_pedido = $this->Tienda_model->agrega_pedido($datos);
		if($id_pedido!=FALSE){   //si nada salio mal al agregar el pedido a la base
			$detalle = $this->Tienda_model->agrega_detalle_pedido($basket, $id_pedido);
			if($detalle!=FALSE){ //si nada salio mal al agregar el detalle del pedido a la base
				$this->load->library('email','','correo');
				$this->correo->from('noreply@yourdomain.com', 'Masosports');
				  $this->correo->to($usuario->email);  //le enviamos un correo al cliente
				  $this->correo->subject('Detalle del pedido');
				  $data["total"] = $this->carrito->get_total();
				  $data["NumeroItems"] = $this->carrito->get_numero_items();
				  $data["items"] = $this->carrito->get_carrito();
				  $msg = $this->load->view('detalle_pedido_email', $data, TRUE);
				  $this->correo->message($msg);
				if($this->correo->send(FALSE))
					{//si se envio el mensaje
					$data["menu_activo"] = "index";
				    $data["content"] = "index";
					$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
					$data["msg"] = "detalle_pedido_enviado";
					$this->session->unset_userdata("basket");    //vaciamos el carrito
					$data["total"] = $this->carrito->get_total();
					$data["NumeroItems"] = $this->carrito->get_numero_items();
					$this->load->view("template", $data);
					#Mensaje de correo enviado
					}
				else
					{//Error al enviar el correo
					   #show_error($this->correo->print_debugger());						
						$data["msg"] = "error_detalle_pedido_correo";
						$this->load->view("template", $data);
					 }
				}
				else{
					$data["msg"] = "error_bd";
					$this->load->view("template", $data);
				}
			}
		//Algo salio mal en la base
		else{
			$data["msg"] = "error_bd";
			$this->load->view("template", $data);
		}

 	}



 	public function Agregar(){
 		
 		// si trata de ingresar a la url /principal/Agregar sin ser un usuario root
 		if(!$this->session->userdata("usuario_root")) redirect("principal/");
 		//si es un usuario root
 		else{
 			$data["menu_activo"] = "index";
			$data["total"] = $this->carrito->get_total();
			$data['usuario'] =$this->session->userdata("usuario");
			$data["msg"] = "";
			$data["NumeroItems"] = $this->carrito->get_numero_items();
			$data["content"] = "agregarProducto";
			$this->load->view("template", $data);
 		}



 	}

 	public function agregarProducto() {

 		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('cantidad', 'Cantidad Actual', 'trim|required|numeric');
		$this->form_validation->set_rules('precio', 'Precio', 'trim|required|numeric');
		$this->form_validation->set_rules('precio_envio', 'Precio de Envio', 'trim|required|numeric');
		$this->form_validation->set_rules('descripcion', 'Descripcion','trim|required' );

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('numeric',  'El campo %s debe ser numerico');

		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data['usuario'] =$this->session->userdata("usuario");
		$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
		$data["content"] = "agregarProducto";


		$config['upload_path'] = '././media/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '6000';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		if ($this->form_validation->run() == FALSE)
		{	//Si el formulario se lleno de forma incorrecta regresamos
				$data["msg"] = "";	
				$this->load->view("template", $data);
		}
		else
		{	
			//Subir el archivo al servidor
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$data["Errors"] = $error;
				$data["msg"] = "error_subir_servidor";	
				$this->load->view("template", $data);
			}
	
				$estatus = $this->Tienda_model->agregarPruducto($this->input->post());
				if(!$estatus) 
				{
					$data["msg"] = "error_ingresar";	
					$this->load->view("template", $data);
				}
				else{
					$data["content"] = "index";
					$data["msg"] = "agregadoCorrecto";	
					$this->load->view("template", $data);
				}

 		}

}



	public function modifica_producto($id)
	{
		$id = (int) $id;
		if(empty($id) || $id < 0) redirect("principal");

		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["producto"] = $this->Tienda_model->get_producto($id);
	    if(!(empty($data["producto"]))){
	    	if(($data["producto"]->Categorias_id)==1) $data["menu_activo"] = "hombres";
	    	else if(($data["producto"]->Categorias_id)==2) $data["menu_activo"] = "mujeres";
	    $data["relacionados"] = $this->Tienda_model->get_relacionados($data["producto"]);
		$data["content"] = "modifica_producto";
	    $this->load->view("template", $data); 
	    }
	    else{
	    	redirect("principal");
	    }  
	}

	public function elimina_producto($id)
	{
		$id = (int) $id;
		if(empty($id) || $id < 0) redirect("principal");
		$estatus = $this->Tienda_model->eliminaProducto($id);

		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["producto"] = $this->Tienda_model->get_producto($this->input->post('id'));
		$data['usuario'] =$this->session->userdata("usuario");
		$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
		$data["content"] = "index" ;

		if(!$estatus) 
				{

					$data["msg"] = "errorEliminar";	
					$this->load->view("template", $data);
				}
				else{
					$data["msg"] = "eliminaroCorrectamente";	
					$this->load->view("template", $data);
				}
	}



	public function actualizando_producto()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('cantidad', 'Cantidad Actual', 'trim|required|numeric');
		$this->form_validation->set_rules('precio', 'Precio', 'trim|required|numeric');
		$this->form_validation->set_rules('precio_envio', 'Precio de Envio', 'trim|required|numeric');
		$this->form_validation->set_rules('descripcion', 'Descripcion','trim|required' );

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('numeric',  'El campo %s debe ser numerico');

		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["producto"] = $this->Tienda_model->get_producto($this->input->post('id'));
		$data['usuario'] =$this->session->userdata("usuario");
		$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
		$data["content"] = "modifica_producto";

		if ($this->form_validation->run() == FALSE)
		{	//Si el formulario se lleno de forma incorrecta regresamos
			    $this->load->view("template", $data);
				$data["msg"] = "";	
		}
		else
		{	
				$data["content"] = "index";
				$estatus = $this->Tienda_model->modificaProducto($this->input->post());
				if(!$estatus) 
				{

					$data["msg"] = "error_modificar";	
					$this->load->view("template", $data);
				}
				else{
					$data["content"] = "index";
					$data["msg"] = "modificadoCorrectamente";	
					$this->load->view("template", $data);
				}

 		}
	}



	

}