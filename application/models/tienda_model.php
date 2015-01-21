<?php
class Tienda_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        #$db_debug = $this->db->db_debug; // Desactivamos el debug de la base de datos
        #$this->db->db_debug = FALSE; 
    }
    
     public function get_productos_recientes($cantidad)
    {
        $this->db->order_by("FechaRegistro", "DESC");
        //Obtiene de la posicion 0 el numero $cantidad de tuplas
        $this->db->limit($cantidad,0);

        $query = $this->db->get("producto");

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }

      public function get_productos_categoria($categoria)
    {
        $query = $this->db->where("producto.Categorias_id",$categoria)->get("producto");
        
        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }


    public function get_producto($id)
    {
        $this->db->select('producto.id,cantidad,FechaRegistro,producto.nombre,precio,
            imagen,departamento.nombre AS Departamento,Categorias_id,costoEnvio,producto.descripcion');
        $this->db->from('producto');
        $this->db->join('departamento', 'producto.Categorias_id = departamento.id');
        $this->db->where('producto.id', $id);

        $query = $this->db->get();

        if($query->num_rows() == 1) return $query->row();

        return FALSE;
    }

    public function get_relacionados($producto)
    {   #Misma categoria y menor precio pero obviamente no el mismo
        $id=$producto->id;
        $categoria=$producto->Categorias_id;
        $precio=$producto->precio;

        $this->db->where('Categorias_id = ', $categoria);
        $this->db->where('precio <=', $precio);
        $this->db->where('id !=', $id);
        $this->db->limit(3,0);
        $query = $this->db->get("producto");
        if($query->num_rows() > 0) return $query->result();

        return FALSE;


    }

    public function get_categorias()
    {
        $query = $this->db->get("categorias");

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }

    public function get_productos_aleatorios($cantidad)
    {
        $this->db->order_by("RAND()");
        $this->db->limit($cantidad, 0);

        $query = $this->db->get("producto");

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }

    public function getEntidades()
    {
        $query = $this->db->get("cat_entidad");
        if($query->num_rows() > 0) return $query->result();
        return FALSE;
    }

    public function getMunicipios($estado_id)
    {
        $this->db->where('cv_entidad = ', $estado_id);
        $query = $this->db->get("cat_municipio");
        if($query->num_rows() > 0) return $query->result();
        return FALSE;
    }

    public function agrega_pedido($datos)
    {
        $insert = $this->db->insert('pedido', $datos);
        if($insert) return $this->db->insert_id();
        return FALSE;
    }

    
    public function agrega_detalle_pedido($basket, $id_pedido)
    {
        foreach ($basket as $item) {
            $datos = array(
                "cantidad" => $item["cantidad"],
                "precio" => $item["precio"],
                "Pedidos_id" => $id_pedido,
                "Productos_id" => $item["id_producto"]
            );
            $insert = $this->db->insert('detalle_pedidos', $datos);
            if(!$insert) return FALSE;
        }

        return TRUE;
    }

    public function agregarPruducto($datos)
    {
        if(!isset($datos["hidden_nombre"]))
        {
            $datos["hidden_nombre"] = "desconocido.jpg";
            echo $datos["hidden_nombre"];
        }
        else{
            $dir = substr(strrchr($datos["hidden_nombre"], "\\"), 1);
            $datos["hidden_nombre"] =$dir ;
        }
            
         $current_date = date("Y-m-d");
        $data = array(
                "nombre" => $datos["nombre"],
                "cantidad" => $datos["cantidad"],
                "precio" => $datos["precio"],
                "costoEnvio" => $datos["precio_envio"],
                "descripcion" =>  $datos["descripcion"],
                "FechaRegistro" => $current_date,
                "Categorias_id" => $datos["categoria"],
                "imagen" => $datos["hidden_nombre"]
            );
            $insert = $this->db->insert('producto', $data);
            if(!$insert) 
                {
                    //echo $this->db->last_query();   
                    return FALSE;

                }
            else return TRUE;
    }


    public function modificaProducto($datos)
    {
         if(!isset($datos["imagen"]))
        {
            $datos["imagen"] = "desconocido.jpg";
        }
            
         $current_date = date("Y-m-d");
        $data = array(
                "nombre" => $datos["nombre"],
                "cantidad" => $datos["cantidad"],
                "precio" => $datos["precio"],
                "costoEnvio" => $datos["precio_envio"],
                "descripcion" =>  $datos["descripcion"],
                "FechaRegistro" => $current_date,
                "Categorias_id" => $datos["categoria"],
                "imagen" => $datos["imagen"]
            );
           $this->db->where('id', $datos["id"]);
           $insert= $this->db->update('producto', $data); 
            if(!$insert) 
                {
                    //echo $this->db->last_query();   
                    return FALSE;
                }
            else return TRUE;
            
    }

    public function eliminaProducto($id)
    {
        $this->db->where('id', $id);
        $insert = $this->db->delete('producto'); 
        if(!$insert) 
            return FALSE;
        else return TRUE;
    }

}
