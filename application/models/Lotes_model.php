<?php

class Lotes_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'Lotes';
    }

    public function getAllLotes()
    {
        try {

            $this->db->select(" lotes.lote, CONCAT(userbuy.nombres,' ',userbuy.apellidos)  AS usuario_compra, 
                                lotes.fecha_ini_compra, lotes.fecha_fin_compra, lotes.proceso_selecciona, 
                                lotes.usuario_selecciona,
                                CONCAT(userselect.nombres,' ',userselect.apellidos) as usuario_selecciona, 
                                lotes.fecha_ini_selecciona, lotes.fecha_fin_selecciona, 
                                lotes.proceso_procesar, lotes.usuario_procesa, 
                                CONCAT(usertritura.nombres,' ',usertritura.apellidos) as usuario_tritura, 
                                lotes.fecha_ini_procesa, lotes.fecha_fin_procesa, 
                                lotes.proceso_almacenar, lotes.usuario_almacena, 
                                CONCAT(usersave.nombres,' ',usersave.apellidos) as usuario_almacena, 
                                lotes.fecha_ini_almacena, lotes.fecha_fin_almacena, 
                                tipomateriales.tipo material, lotes.peso");
            $this->db->from('lotes');
            $this->db->join('compras', 'compras.lote = lotes.lote', 'inner');
            $this->db->join('usuario as userbuy', 'userbuy.id = compras.usuario_compra', 'inner');
            $this->db->join('usuario AS userselect', 'userselect.id = lotes.usuario_selecciona', 'left');
            $this->db->join('usuario AS usertritura', 'usertritura.id = lotes.usuario_procesa', 'left');
            $this->db->join('usuario AS usersave', 'usersave.id = lotes.usuario_almacena', 'left');
            $this->db->join('tipomateriales', 'tipomateriales.id = lotes.material', 'inner');

            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen lotes');
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
