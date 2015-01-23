<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("Carrito");
	}

	public function index()
	{
		#nos manda a la pantalla login por primera vez
		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["content"] = "login";
		$this->load->view("template", $data);
	}

	public function valida_usuario()
	{
		#El usuario ingresa datos a su formulario login'
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email','Debe ingresar un email valido');

		$data["menu_activo"] = "index";

		$data["total"] = $this->carrito->get_total();

		$data["NumeroItems"] = $this->carrito->get_numero_items();

		$data["content"] = "login";

		if($this->form_validation->run() == FALSE){
			#Si hay errores en el formulario
			if(($this->input->post('lugar'))=="en_carrito")
			{   #Si se encuentra en el login del dentro del carrito
				$data["content"] = "detalle_pedido_login";
				$this->load->view("template", $data);
			}
			else
			{
				$this->load->view("template", $data);
			}
		}else{
			$usuario = $this->Clientes_model->valida_usuario($this->input->post());
			if($usuario == FALSE){
				#si no se encontraron el usuario en la base
				if(($this->input->post("lugar"))=="en_carrito")
				{   #Si se encuentra en el login del dentro del carrito
					$data["content"] = "detalle_pedido_login";
					$data["msg"] = "datos_incorrectos";
					$this->load->view("template", $data);
				}
			else
				{

					$data["msg"] = "error";
					$this->load->view("template", $data);
				}
			}else{
				#el usuario se encuentra en la base
				if($this->Clientes_model->is_active($usuario->email)){
					#todo salio bien, comprueba que sea un usuario activo
					$this->session->set_userdata("usuario_logeado", TRUE);
					$this->session->set_userdata("usuario", $usuario);
					#comprueba que tipo de usuario es
					if($this->Clientes_model->is_root($usuario->email))
						$this->session->set_userdata("usuario_root", TRUE);
					else
						$this->session->set_userdata("usuario_root", FALSE);
				
					if(($this->input->post('lugar'))=="en_carrito")
					{   #Si se encuentra en el login del dentro del carrito
						redirect("principal/detalle_pedido");
					}
					else
					{
						redirect("principal");
					}	
				}
				else
				{ #El usuario no es activo
					$data["msg"] = "no_activo";
					if(($this->input->post('lugar'))=="en_carrito")
					{   #Si se encuentra en el login del dentro del carrito
						$data["content"] = "detalle_pedido_login";
						$this->load->view("template", $data);
					}
					else
					{
						$this->load->view("template", $data);
					}
				}
			}
		}
	}

	public function salir()
	{
		#salir de la sesion
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('usuario_logeado');
		$this->carrito->delete_carrito();
		$this->session->set_userdata("usuario_root", FALSE);
		$this->session->userdata = array();
		redirect("principal");
	}

	public function registrar()
	{
		$data["menu_activo"] = "index";
		$data["content"] = "register";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$this->load->view("template", $data);
	}

	public function guardar_cuenta()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[cliente.email]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_rules('pass', 'Contraseña','trim|required|min_length[4]|max_length[12]' );
		$this->form_validation->set_rules('pass2', 'Confirma Contraseña','trim|required|matches[pass]' );


		$this->form_validation->set_message('is_unique', 'Ya existe un usuario registrado con este %s ');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'Debe ingresar un %s valido');
		$this->form_validation->set_message('matches', 'Los passwords no coinciden');
		$this->form_validation->set_message('min_length', 'El %s debe tener al menos 4 caracteres');
		$this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');

		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["content"] = "register";

		if ($this->form_validation->run() == FALSE)
		{	//Si el formulario se lleno de forma incorrecta regresamos
			if(($this->input->post('lugar'))=="en_carrito")
			{   #Si se encuentra en el login del dentro del carrito
				$data["content"] = "detalle_pedido_login";
				$this->load->view("template", $data);
			}
			else
			{
				$this->load->view("template", $data);
			}
		}
		else
		{
				$valid_pass = md5(uniqid());  //codigo unico para enviar al correo
				$this->load->library('email','','correo');
				$this->correo->from('noreply@yourdomain.com', 'Masosports');
				$this->correo->to($this->input->post('email'));
				$this->correo->subject('Activar cuenta Masosports');
				$data["mensaje"] = base_url()."login/activarCuenta/".$valid_pass;
				$msg = $this->load->view('email_activar', $data, TRUE);
				$this->correo->message($msg);
			
			 	if($this->correo->send(FALSE))
				  {//si se envio el mensaje
				  	#le mandamos toda la informacion del formulario al modelo encargado
					#regresa FALSE si algo salio mal o el objeto del usuario si fue correcto
					$ingresar = $this->Clientes_model->agregar_cliente($this->input->post());
					if($ingresar == 1)
					{#se pudo registrar al cliente
					$usuario = $this->Clientes_model->obtenerCliente($this->input->post());
				  	if($this->Clientes_model->set_temp_activate($usuario->email,$valid_pass))
				  	{//si se pudo ingresar el codigo a la base de datos

				  		$data["msg"] = "activacion";  #Mensaje de envio de correo de activacion
						$data["content"] = "index";
						$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
						$this->load->view("template", $data); 
					  	#Mensaje de correo enviado
				  	}
				  else{
				  		//no se pudo ingresar el codigo a BD
					  	if(($this->input->post('lugar'))=="en_carrito")
							{   #Si se encuentra en el login del dentro del carrito
								$data["content"] = "detalle_pedido_login";
								$data["msg"] = "error_base";  //error de conexion a BD
								$this->load->view("template", $data);
							}
						else
						{
							$data["msg"] = "error";  //error de conexion a BD
							$this->load->view("template", $data);
						}
	 			  	}
	 			  }
	 			  else{ 
				if(($this->input->post('lugar'))=="en_carrito")
					{   #Si se encuentra en el login del dentro del carrito
						$data["content"] = "detalle_pedido_login";
						$data["msg"] = "error_base";  //error de conexion a BD
						$this->load->view("template", $data);
					}
					else
					{
						$data["msg"] = "error";  //error de conexion a BD
						$this->load->view("template", $data);
					}
				}
	 			  }
	 			   else
				  {	//Error al enviar el correo
					   #show_error($this->correo->print_debugger());
					  	$data["msg"] = "err_correo";
					  	if(($this->input->post('lugar'))=="en_carrito")
						{   #Si se encuentra en el login del dentro del carrito
							$data["content"] = "detalle_pedido_login";
							$this->load->view("template", $data);
						}
					else
					{
						$this->load->view("template", $data);
					}
				  	
				  }
		}
	}

	public function activarCuenta($temp_pass){
		//proceso que se ejecuta cuando el usuario ingresa la liga de activacion
        $data["menu_activo"] = "index";
        $data["content"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
		#Comprobamos que la liga de activacion sea correcta
        $usuario =$this->Clientes_model->is_valid_pass_activate($temp_pass);
			if($usuario==FALSE){  
			#key invalido redirecciona a principal con un mensaje
				$data["msg"] = "error_activate";
				$this->load->view("template", $data);
			}
			else{
				#liga correcta
				#activamos al usuario
				if($this->Clientes_model->update_activate($usuario->email))
			  	{ #Se pudo activar la cuenta
			  	   #Activamos al usuario
			  	  $this->session->set_userdata("usuario_logeado", TRUE);
				  $this->session->set_userdata("usuario", $usuario);	
				  $data["msg"] = "succ_activate";
				  $this->load->view("template", $data);
			  	}
			  	else{
					$data["msg"] = "error_activando_cuenta";
					$this->load->view("template", $data);
			  	}
			}
    }



	public function olvidoPass()
	{   //Redirigimos a la pantalla forgot para que ingrese su correo
		$data["menu_activo"] = "index";
		$data["content"] = "forgot";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$this->load->view("template", $data);
	}

	public function correoPass()
	{   //Mandamos un correo con una liga para recuperar su pass
		$data["menu_activo"] = "index";
		$data["content"] = "forgot";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_message('valid_email', 'Debe ingresar un %s valido');

		if ($this->form_validation->run() == FALSE)
		{	//si ingreso incorrectamente el formulario 
			$this->load->view("template", $data);		
		}
		else{
			$email_temp=$this->input->post('email');
			$usuario = $this->Clientes_model->obtenerCliente2($email_temp);
			if($usuario==FALSE){
				//Si no existe un usuario con ese correo registrado
				$data["msg"] = "error";
				$this->load->view("template", $data);
			}
			else{
		$temp_pass = md5(uniqid());  //codigo unico para enviar al correo
		$this->load->library('email','','correo');
		$this->correo->from('noreply@yourdomain.com', 'Masosports');
		  $this->correo->to($usuario->email);
		  $this->correo->subject('Recuperar Password');
		  $data["mensaje"] = base_url()."login/reset_password/".$temp_pass;
		  $msg = $this->load->view('email', $data, TRUE);
		  $this->correo->message($msg);
		  if($this->Clientes_model->set_temp_reset($usuario->email,$temp_pass)){
			  	//ingresamos el codigo en la base de datos
			  	if($this->correo->send(FALSE))
			  	{//si se envio el mensaje
			  	$data["msg"] = "enviado";
				$this->load->view("template", $data);
			  	#Mensaje de correo enviado
			  	}
			  	else
				{//Error al enviar el correo
				   #show_error($this->correo->print_debugger());
				  	$data["msg"] = "err_correo";
					$this->load->view("template", $data);
				 }
			}
			  else{
			  	$data["msg"] = "error_conexion";
				$this->load->view("template", $data);
			}

			}	
		}
	}

	public function reset_password($temp_pass){
		$data["content"] = "index";
	    $data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
        $data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		#Comprobamos que la liga de recuperacion sea correcta
        $usuario =$this->Clientes_model->is_temp_pass_valid($temp_pass);
			if($usuario==FALSE){  #key invalido redirecciona a principal con un mensaje
				$data["msg"] = "error_forgot";
				$this->load->view("template", $data);
			}
			else{
				#liga correcta
				#comprobamos que el usuario este activo
				if($this->Clientes_model->is_active($usuario->email)){
					$this->session->set_userdata("usuario", $usuario);
					#redireccionamos a la view reset_password
					$data["content"] = "reset_password";
					$this->load->view("template", $data);
				}
				else
				{ #El usuario no es activo
					$data["msg"] = "no_activo";
					$this->load->view("template", $data);
				}
			}
    }

    public function cambiarPass(){
        $data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["content"] = "reset_password";
		$this->load->view("template", $data);
    }

    public function restore_pass(){
    	$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data["NumeroItems"] = $this->carrito->get_numero_items();

        $this->form_validation->set_rules('pass', 'Contraseña','trim|required|min_length[4]|max_length[12]' );

		$this->form_validation->set_rules('pass2', 'Confirma Contraseña','trim|required|matches[pass]' );

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');

		$this->form_validation->set_message('matches', 'Los passwords no coinciden');

		$this->form_validation->set_message('min_length', 'El %s debe tener al menos 4 caracteres');

		$this->form_validation->set_message('max_length', 'El %s debe tener un máximo de 12 caracteres');

            if ($this->form_validation->run() == FALSE)
		{	#si hubo error al llenar el formulario
			$data["content"] = "reset_password";
			$this->load->view("template", $data);
		}
		else{
			#se lleno bien el formulario
			#Obtenemos el usuario que intenta rescatar
			$email=$this->session->userdata("usuario")->email;
			#cambiamos su password
			$usuario = $this->Clientes_model->cambiarPass($email,$this->input->post());
			#problema de conexion
			if($usuario==FALSE){
				$data["msg"] = "error_conexion";  #Error al cambiar contraseña
				$data["content"] = "reset_password";
				$this->load->view("template", $data);
			}
			else{
				#obtenemos el cliente para autologear
				$usuario = $this->Clientes_model->obtenerCliente2($email);
				$this->session->set_userdata("usuario_logeado", TRUE);
				$this->session->set_userdata("usuario", $usuario);	
				#redireccionamos a principal

				
					$data["msg"] = "success_cambio_pass";  #Se cambio la contraseña
					$data["content"] = "index";
					$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
					$this->load->view("template", $data); 
			}

		}
    }

    public function Perfil(){

    	$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data['usuario'] =$this->session->userdata("usuario");
		$data['entidades']=$this->Tienda_model->getEntidades();
		$data["NumeroItems"] = $this->carrito->get_numero_items();
		$data["content"] = "perfil";
		$this->load->view("template", $data);
    }

     public function cargarMun()
 	{
		 $estado_id = $this->input->post('estado_id'); //Recogemos el identificador del estado pasado por POST
		 $municipios = $this->Tienda_model->getMunicipios($estado_id); //Obtenemos los municipios 
		 $teams = array(); //Almacenaremos los nombre de los equipos de la forma "id_equipo" => "nombre_equipo"
		 if($municipios!=FALSE)
		 {
		 	$data["municipios"] = $municipios;
			echo $this->load->view('municipios',$data); 
			
			//$this->output->set_output(json_encode($municipios));
		 }

	 
 	}

 	public function actualiza_perfil()
 	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Dirección', 'trim|required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');

		$data["menu_activo"] = "index";
		$data["total"] = $this->carrito->get_total();
		$data['entidades']=$this->Tienda_model->getEntidades();
		$data["NumeroItems"] = $this->carrito->get_numero_items();

		if ($this->form_validation->run() == FALSE)
		{	
			$data["content"] = "perfil";
			$this->load->view("template", $data);
		}
		else
		{
			$email=$this->session->userdata("usuario")->email;
			$estado=$this->input->post('estado');
			$municipio=$this->input->post('municipio');
			$nombre=$this->input->post('nombre');
			$apellidos=$this->input->post('apellidos');
			
			if(($this->Clientes_model->actualizaPerfil($estado,$municipio,$email,$nombre,$apellidos))==TRUE){
				$data["msg"] = "success_actualizar_perfil";  #perfil actualizado correctamente
				$data["recientes"] = $this->Tienda_model->get_productos_recientes(6);
				$data["content"] = "index";
				$usuario = $this->Clientes_model->obtenerCliente2($email);
				$this->session->set_userdata("usuario", $usuario);
				$this->load->view("template", $data);
			}
			else{
				$data["msg"] = "error_actualizar_perfil";  #error al actualizar
				$data["content"] = "perfil";
				$this->load->view("template", $data);
			}
		}


 	}
}