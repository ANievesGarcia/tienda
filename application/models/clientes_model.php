<?php

class Clientes_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$db_debug = $this->db->db_debug; // Desactivamos el debug de la base de datos
		$this->db->db_debug = FALSE; 
	}

	public function valida_usuario($datos)
	{
		$array = array("email" => $datos["usuario"], "password" => md5($datos["password"]));
		$query = $this->db->where($array)->get("cliente");
		if($query->num_rows() == 1) return $query->row();

		return FALSE;
	}
	public function is_active($email)
	{
		$array = array("email" => $email, "estatus" =>1);
		$query = $this->db->where($array)->get("cliente");
		if($query->num_rows() == 1) return TRUE;

		return FALSE;
	}

	public function is_root($email)
	{
		$array  = array ("email" => $email , "tipo_usuario" => 0 );
		$query = $this->db->where($array)->get("cliente");
		if($query->num_rows() == 1) 
		{
			return TRUE;
		}
		return FALSE;
	}


	public function agregar_cliente($datos)
	{
		$array = array(
			"email" => $datos["email"],
			"nombre" => $datos["nombre"],
			"apellidos" => $datos["apellidos"],
			"direccion" => $datos["direccion"],
			"password" => md5($datos["pass"]),
		);
	
		$this->db->insert('cliente', $array);
		$str = $this->db->last_query();
		#Devolvemos el objeto del cliente creado o FALSE si algo salio mal
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		else {
		  /*$msg = $this->db->_error_message();
		  $num = $this->db->_error_number();

		  $mensaje = "Error(".$num.") ".$msg;
		  return $mensaje;*/
		  return FALSE;
		}
	
	}


//Obtiene el cliente con email y password
	public function obtenerCliente($datos){
			$array = array("email" => $datos["email"], "password" => md5($datos["pass"]));
			$query = $this->db->where($array)->get("cliente");
			if($query->num_rows() == 1) return $query->row();
			else return FALSE; 
	}


//Obtiene el cliente solo con el email
	public function obtenerCliente2($cve){
			$this->db->where('email = ',$cve);
			$query = $this->db->get("cliente");
			if($query->num_rows() == 1) return $query->row();
			else return FALSE; 
	}

	public function set_temp_reset($email,$temp_pass){
    $data =array('reset_pass'=>$temp_pass);
      
    if($data){
        $this->db->where('email', $email);
        $this->db->update('cliente', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}

public function set_temp_activate($email,$valid_pass){
    $data =array('activate_pass'=>$valid_pass);
      
    if($data){
        $this->db->where('email', $email);
        $this->db->update('cliente', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}

public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('cliente');
    if($query->num_rows() == 1){
        return $query->row();
    }
    else return FALSE;
}

public function is_valid_pass_activate($temp_pass){
    $this->db->where('activate_pass', $temp_pass);
    $query = $this->db->get('cliente');
    if($query->num_rows() == 1){
        return $query->row();
    }
    else return FALSE;
}

public function update_activate($email)
{
   $data =array('estatus'=>1);
      
    if($data){
        $this->db->where('email', $email);
        $this->db->update('cliente', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}


public function cambiarPass($email,$datos){
	$data =array("password" => md5($datos["pass"]));
	if($data){
        $this->db->where('email', $email);
        $this->db->update('cliente', $data);  
        return TRUE;
    }else{
        return FALSE;
    }
}

public function actualizaPerfil($estado,$municipio,$email){
	 $data =array('estado'=>$estado,'municipio'=>$municipio);
    if($data){
        $this->db->where('email', $email);
        $this->db->update('cliente', $data);  
        return TRUE;
    }else{
        return FALSE;
    }
}

public function get_estado($email){
	$this->db->select('cat_entidad.nombre');
	$this->db->from('cliente');
	$this->db->join('cat_entidad', 'cat_entidad.cv_entidad = cliente.estado');
	$this->db->where('email', $email);
	$query = $this->db->get();
	if($query->num_rows() == 1) return $query->row();
	else return FALSE; 
}

public function get_municipio($email){
	$this->db->select('cat_municipio.nombre');
	$this->db->from('cliente');
	$this->db->join('cat_municipio', 'cat_municipio.cv_municipio = cliente.municipio');
	$this->db->where('email', $email);
	$query = $this->db->get();
	if($query->num_rows() == 1) return $query->row();
	else return FALSE; 
}


}