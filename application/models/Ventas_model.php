<?php

class Ventas_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'ventas';
    }

    public function getAllVentas()
    {
        try {

            $this->db->select("ventas.id, CONCAT(cliente.nombres,' ',cliente.apellidos)  AS cliente, ventas.valor_total, 
            ventas.fecha_venta, CONCAT(usuario.nombres,' ',usuario.apellidos) AS vendedor");
            $this->db->from('ventas');
            $this->db->join('cliente', 'cliente.id = ventas.cliente','inner');
            $this->db->join('usuario', 'usuario.id = ventas.usuario_vendedor','inner');
            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage($this->db->error()['code'], 'No existen ventas');
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
