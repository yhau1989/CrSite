<?php

class Compras_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'compras';
    }

    public function getAllCompras($solodDelDia = null)
    {
        $data = false;

        try {

            $this->db->select("compras.id, CONCAT(proveedor.nombres,' ',proveedor.apellidos)  as proveedor, compras.peso_total, compras.valor_total, 
            compras.fecha_compra, CONCAT(usuario.nombres,' ',usuario.apellidos) AS comprador");
            $this->db->from($this->table_name);
            $this->db->join('proveedor', 'proveedor.id = compras.proveedor','inner');
            $this->db->join('usuario', 'usuario.id = compras.usuario_compra','inner');

           
            if(isset($solodDelDia))
            {
                $fecha = new DateTime();
                $this->db->where('fecha_compra >= ', $fecha->format('Y-m-d 00:00'));
            }
            
            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen compras ');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }

        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }


    private function setErrorMesaage($codeError, $errorMsg)
    {
        return array(
            'status' => $codeError,
            'data' => '
            <div class="ui small message">
                <!--<i class="close icon"></i>-->
                <div>
                '.  $errorMsg .'
                </div>
            </div>'
        );

    }


    public function filtrarCompras($datos)
    {
        $data = false;
        $error = 0;

        //var_dump($datos);
        try {

            $this->db->select("compras.id, CONCAT(proveedor.nombres,' ',proveedor.apellidos)  as proveedor,compras.peso_total, compras.valor_total, 
            compras.fecha_compra, CONCAT(usuario.nombres,' ',usuario.apellidos) AS comprador");
            $this->db->from( $this->table_name);
            $this->db->join('proveedor', 'proveedor.id = compras.proveedor','inner');
            $this->db->join('usuario', 'usuario.id = compras.usuario_compra','inner');

            if(strlen($datos['comprador']) > 0) 
            {$this->db->where('usuario_compra',$datos['comprador']);}

            if(strlen($datos['proveedor']) > 0) 
            {$this->db->where('proveedor',$datos['proveedor']);}

            if(strlen($datos['fdesde']) > 0) 
            {$this->db->where('fecha_compra >= ', $datos['fdesde'] . ' 00:00');}

            if(strlen($datos['fhasta']) > 0) 
            {$this->db->where('fecha_compra <=',$datos['fhasta'] . ' 23:59');}
            
            $data = $this->db->get(); 
           

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen compras');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }

        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }





}
