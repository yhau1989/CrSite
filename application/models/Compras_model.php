<?php

class Compras_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'compras';
    }

    public function getAllCompras()
    {
        $data = false;
        $error = 0;

        try {

            $this->db->select("compras.id, CONCAT(proveedor.nombres,' ',proveedor.apellidos)  as proveedor,lote, compras.valor_total, 
            compras.fecha_compra, CONCAT(usuario.nombres,' ',usuario.apellidos) AS comprador");
            $this->db->from('compras');
            $this->db->join('proveedor', 'proveedor.id = compras.proveedor','inner');
            $this->db->join('usuario', 'usuario.id = compras.usuario_compra','inner');
            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage($this->db->error()['code'], 'No existen compras');
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




}
