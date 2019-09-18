<?php

class Odt_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'ordentrabajo';
    }

    public function getAllODT($solodDelDia = null)
    {
        try {

            $this->db->select(" ordentrabajo.orden_id,
                                CONCAT(userselect.nombres,' ',userselect.apellidos) as usuario_selecciona, 
                                ordentrabajo.fecha_ini_selecciona, ordentrabajo.fecha_fin_selecciona, 
                                ordentrabajo.proceso_trituracion,  
                                CONCAT(usertritura.nombres,' ',usertritura.apellidos) as usuario_tritura, 
                                ordentrabajo.fecha_ini_tritura, ordentrabajo.fecha_fin_tritura, 
                                ordentrabajo.proceso_almacena,
                                CONCAT(usersave.nombres,' ',usersave.apellidos) as usuario_almacena, 
                                ordentrabajo.fecha_ini_almacena, ordentrabajo.fecha_fin_almacena, 
                                tipomateriales.tipo material, ordentrabajo.peso_total, ordentrabajo.faltante");
            $this->db->from('ordentrabajo');
            $this->db->join('usuario AS userselect', 'userselect.id = ordentrabajo.usuario_selecciona', 'left');
            $this->db->join('usuario AS usertritura', 'usertritura.id = ordentrabajo.usuario_tritura', 'left');
            $this->db->join('usuario AS usersave', 'usersave.id = ordentrabajo.usuario_almacena', 'left');
            $this->db->join('tipomateriales', 'tipomateriales.id = ordentrabajo.tipo_material', 'inner');

            if (isset($solodDelDia)) {
                $fecha = new DateTime(TIME_ZONE_APP);
                $this->db->where('fecha_ini_selecciona >= ', $fecha->format('Y-m-d 00:00'));
            }

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




    public function filtrarODT($datos)
    {
        $data = false;
        $error = 0;

        try {

            $this->db->select(" ordentrabajo.orden_id,
                                CONCAT(userselect.nombres,' ',userselect.apellidos) as usuario_selecciona, 
                                ordentrabajo.fecha_ini_selecciona, ordentrabajo.fecha_fin_selecciona, 
                                ordentrabajo.proceso_trituracion,  
                                CONCAT(usertritura.nombres,' ',usertritura.apellidos) as usuario_tritura, 
                                ordentrabajo.fecha_ini_tritura, ordentrabajo.fecha_fin_tritura, 
                                ordentrabajo.proceso_almacena,
                                CONCAT(usersave.nombres,' ',usersave.apellidos) as usuario_almacena, 
                                ordentrabajo.fecha_ini_almacena, ordentrabajo.fecha_fin_almacena, 
                                tipomateriales.tipo material, ordentrabajo.peso_total, ordentrabajo.faltante");
            $this->db->from('ordentrabajo');
            $this->db->join('usuario AS userselect', 'userselect.id = ordentrabajo.usuario_selecciona', 'left');
            $this->db->join('usuario AS usertritura', 'usertritura.id = ordentrabajo.usuario_tritura', 'left');
            $this->db->join('usuario AS usersave', 'usersave.id = ordentrabajo.usuario_almacena', 'left');
            $this->db->join('tipomateriales', 'tipomateriales.id = ordentrabajo.tipo_material', 'inner');

            if (strlen($datos['material']) > 0 )
            {$this->db->where('ordentrabajo.tipo_material', $datos['material']);}

            if (strlen($datos['usuarioProceso']) > 0 && strlen($datos['proceso']) == 0) 
            {
                $this->db->where('ordentrabajo.usuario_tritura', $datos['usuarioProceso']);
                $this->db->or_where('ordentrabajo.usuario_almacena', $datos['usuarioProceso']);

            }
            else if(strlen($datos['usuarioProceso']) > 0 && strlen($datos['proceso']) > 0)
            {
                switch ($datos['proceso']) {

                    case 2:
                        $this->db->where('ordentrabajo.usuario_tritura', $datos['usuarioProceso']);
                        break;

                    case 3:
                        $this->db->where('ordentrabajo.usuario_almacena', $datos['usuarioProceso']);
                        break;
                }
            }
            

            if (strlen($datos['fdesde']) > 0 && strlen($datos['proceso']) > 0 && strlen($datos['status_proceso']) > 0) {
                switch ($datos['proceso']) {
                    case 1:
                        $this->db->where('ordentrabajo.fecha_ini_selecciona >=', $datos['fdesde'] . ' 00:00');
                        break;

                    case 2:
                        $this->db->where('ordentrabajo.proceso_trituracion', $datos['status_proceso']);
                        $this->db->where('ordentrabajo.fecha_ini_tritura >=', $datos['fdesde'] . ' 00:00');
                        break;

                    case 3:
                        $this->db->where('ordentrabajo.proceso_almacena', $datos['status_proceso']);
                        $this->db->where('ordentrabajo.fecha_ini_almacena >=', $datos['fdesde'] . ' 00:00');
                        break;
                }
            } else if (strlen($datos['fdesde']) > 0 && strlen($datos['proceso']) > 0 && strlen($datos['status_proceso']) <= 0) {
                switch ($datos['proceso']) {
                    case 1:
                        $this->db->where('ordentrabajo.fecha_ini_selecciona >=', $datos['fdesde'] . ' 00:00');
                        break;

                    case 2:
                        $this->db->where_in('ordentrabajo.proceso_trituracion',  array('1', '0'));
                        $this->db->where('ordentrabajo.fecha_ini_tritura >=', $datos['fdesde'] . ' 00:00');
                        break;

                    case 3:
                        $this->db->where_in('ordentrabajo.proceso_almacena',  array('1', '0'));
                        $this->db->where('ordentrabajo.fecha_ini_almacena >=', $datos['fdesde'] . ' 00:00');
                        break;
                }
            } else if (strlen($datos['usuarioProceso']) == 0 && strlen($datos['proceso']) > 0 && strlen($datos['status_proceso']) <= 0) {
                switch ($datos['proceso']) {
                    
                    case 2:
                        $this->db->where('ordentrabajo.proceso_trituracion', 1);
                        break;

                    case 3:
                        $this->db->where('ordentrabajo.proceso_almacena', 1);
                        break;
                }
            }

            if (strlen($datos['fhasta']) > 0 && strlen($datos['proceso']) > 0 && strlen($datos['status_proceso']) > 0) {
                switch ($datos['proceso']) {
                    case 1:
                        $this->db->where('ordentrabajo.fecha_fin_selecciona <=', $datos['fhasta'] . ' 23:59');
                        break;

                    case 2:
                        $this->db->where('ordentrabajo.proceso_trituracion', $datos['status_proceso']);
                        $this->db->where('ordentrabajo.fecha_fin_tritura <=', $datos['fhasta'] . ' 23:59');
                        break;

                    case 3:
                        $this->db->where('ordentrabajo.proceso_almacena', $datos['status_proceso']);
                        $this->db->where('ordentrabajo.fecha_fin_almacena <=', $datos['fhasta'] . ' 23:59');
                        break;
                }
            } else if (strlen($datos['fhasta']) > 0 && strlen($datos['proceso']) > 0 && strlen($datos['status_proceso']) <= 0) {
                switch ($datos['proceso']) {
                    case 1:
                        $this->db->where('ordentrabajo.fecha_fin_selecciona <=', $datos['fhasta'] . ' 23:59');
                        break;

                    case 2:
                        $this->db->where_in('ordentrabajo.proceso_trituracion', array('1', '0'));
                        $this->db->where('ordentrabajo.fecha_fin_tritura <=', $datos['fhasta'] . ' 23:59');
                        break;

                    case 3:
                        $this->db->where_in('ordentrabajo.proceso_almacena', array('1', '0'));
                        $this->db->where('ordentrabajo.fecha_fin_almacena <=', $datos['fhasta'] . ' 23:59');
                        break;
                }
            }

            

            if (strlen($datos['status_proceso']) > 0 && strlen($datos['proceso']) == 0) {
                $this->db->where('ordentrabajo.proceso_trituracion', $datos['status_proceso']);
                $this->db->or_where('ordentrabajo.proceso_almacena', $datos['status_proceso']);

            } else if (strlen($datos['status_proceso']) > 0 && strlen($datos['proceso']) > 0) {

                switch ($datos['proceso']) {
                    case 2:
                        $this->db->where('ordentrabajo.proceso_trituracion', $datos['status_proceso']);
                        break;

                    case 3:
                        $this->db->where('ordentrabajo.proceso_almacena', $datos['status_proceso']);
                        break;
                }
            }


            
            $data = $this->db->get();
            //log_message('info', $this->db->last_query());

            if ($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0) {
                return array('status' => 0, 'data' =>  $data->result_array());
            } else if ($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0) {
                return $this->setErrorMesaage(1, 'No existen lotes');
            } else {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }
        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }




}
