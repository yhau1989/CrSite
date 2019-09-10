<?php

class Ventas_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'ventas';
    }

    public function getAllVentas($solodDelDia = null)
    {
        try {

            $this->db->select("ventas.id, CONCAT(cliente.nombres,' ',cliente.apellidos)  AS cliente, ventas.valor_total, 
            ventas.fecha_venta, CONCAT(usuario.nombres,' ',usuario.apellidos) AS vendedor");
            $this->db->from('ventas');
            $this->db->join('cliente', 'cliente.id = ventas.cliente','inner');
            $this->db->join('usuario', 'usuario.id = ventas.usuario_vendedor','inner');

            if (isset($solodDelDia)) {
                $fecha = new DateTime(TIME_ZONE_APP);
                $this->db->where('fecha_venta >= ', $fecha->format('Y-m-d 00:00'));
            }

            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen ventas');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }

        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }


    public function getVenta($idVenta)
    {
        try {

            $this->db->select("ventas.id, CONCAT(cliente.nombres,' ',cliente.apellidos)  AS cliente, ventas.valor_total, 
            ventas.fecha_venta, CONCAT(usuario.nombres,' ',usuario.apellidos) AS vendedor");
            $this->db->from('ventas');
            $this->db->join('cliente', 'cliente.id = ventas.cliente','inner');
            $this->db->join('usuario', 'usuario.id = ventas.usuario_vendedor','inner');
            $this->db->where('ventas.id', $idVenta);
            $data = $this->db->get(); 

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                $cabecera = array('status' => 0,'data' =>  $data->result_array());
                
                //get Items
                $items = $this->getDetalleVentaItems($idVenta);
                if($items['status'] == 0)
                {
                    $subtotales = $this->getDetalleVentaSubtotales($idVenta);
                    if($subtotales['status'] == 0)
                    {
                        return array(
                            'status' => 0,
                            'data' => array(
                                'cabecera' => $cabecera['data'],
                                'items' => $items['data'],
                                'totales' =>  $subtotales['data']
                            )                          
                        );
                    }
                    else
                    {
                        return $subtotales;
                    }
                }
                else
                {
                    return $items;
                }
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen venta');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }

        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }



    public function getDetalleVentaItems($idVenta)
    {
        $this->db->select("descripcion, peso, valor, iva, valor_total");
        $this->db->from('ventadetalle');
        $this->db->where('id_venta', $idVenta);
        $data = $this->db->get(); 

        try 
        {
            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
               return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen items para esta venta');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }
            
        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }

    public function getDetalleVentaSubtotales($idVenta)
    {
        $this->db->select("SUM(valor) as SubTotal, (SUM(valor) * 0.12) as IVA");
        $this->db->from('ventadetalle');
        $this->db->where('id_venta', $idVenta);
        $data = $this->db->get(); 

        try 
        {
            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
               return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'error al generar el calculo');
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



    public function filtrarVentas($datos)
    {
        $data = false;
        $error = 0;

        //var_dump($datos);
        try {

            $this->db->select("ventas.id, CONCAT(cliente.nombres,' ',cliente.apellidos)  AS cliente, ventas.valor_total, 
            ventas.fecha_venta, CONCAT(usuario.nombres,' ',usuario.apellidos) AS vendedor");
            $this->db->from( $this->table_name);
            $this->db->join('cliente', 'cliente.id = ventas.cliente','inner');
            $this->db->join('usuario', 'usuario.id = ventas.usuario_vendedor','inner');

            if(strlen($datos['vendedor']) > 0) 
            {$this->db->where('usuario_vendedor',$datos['vendedor']);}

            if(strlen($datos['cliente']) > 0) 
            {$this->db->where('cliente',$datos['cliente']);}

            if(strlen($datos['fdesde']) > 0) 
            {$this->db->where('fecha_venta >= ', $datos['fdesde'] . ' 00:00');}

            if(strlen($datos['fhasta']) > 0) 
            {$this->db->where('fecha_venta <=',$datos['fhasta'] . ' 23:59');}
            
            $data = $this->db->get(); 
           

            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
                return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen ventas');
            }
            else
            {
                return $this->setErrorMesaage($this->db->error()['code'], $this->db->error()["message"]);
            }

        } catch (Exception $th) {
            return $this->setErrorMesaage(99, $th);
        }
    }


    public function ventasPorProducto($datos=null)
    {
        $this->db->select("ventadetalle.id_venta, tipomateriales.id AS id_material, tipomateriales.tipo AS material, ventadetalle.peso, ventadetalle.valor, ventadetalle.fecha_item");
        $this->db->from('ventadetalle');
        $this->db->join('tipomateriales', 'tipomateriales.id = ventadetalle.id_material','inner');
           
        if(strlen($datos['fdesde']) > 0) 
        {$this->db->where('fecha_item >= ', $datos['fdesde'] . ' 00:00');}

        if(strlen($datos['fhasta']) > 0) 
        {$this->db->where('fecha_item <=',$datos['fhasta'] . ' 23:59');}

        if(strlen($datos['material']) > 0) 
        {$this->db->where('id_material',$datos['material']);}

        $data = $this->db->get(); 

        try 
        {
            if($this->db->error()['code'] == 0 && $data->result_id->num_rows > 0)
            {
               return array('status' => 0,'data' =>  $data->result_array());
            }
            else if($this->db->error()['code'] == 0 && $data->result_id->num_rows == 0)
            {
                return $this->setErrorMesaage(1, 'No existen datos para consulta');
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
