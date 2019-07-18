<?php

class Usuarios_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->table_name = 'usuario';
    }

    public function getAllUsuarios()
    {
        $this->db->select('id,guid,email,nombres,apellidos,cedula');
        $this->db->from($this->table_name);
        $this->db->where('estado', 1); //solo activos
        return $this->db->get();
    }


    public function validateExistEmail($email)
    {
        return $this->db->get_where($this->table_name, array('email' => $email))->num_rows();
    }

    public function deleteUserByEmail($email)
    {
        return $this->db->delete($this->table_name, array('email' => $email)); 
    }

    public function deleteUserById($id)
    {
        return $this->db->delete($this->table_name, array('id' => $id)); 
    }


    
    /**
     * login function
     *
     * @param [type] $email
     * @param [type] $psw
     * @return void
     */
    public function login($email, $psw)
    {
        $this->db->select('email');
        $this->db->from($this->table_name);
        $this->db->where('email', $email);
        $this->db->where('estado', 1); //solo activos
        $this->db->where('password', md5($psw));
        $row = $this->db->get()->row();

        //var_dump($row);

        if (isset($row)) {
            
         return array(
                    'status' => 0,
                    'data' => $row
                );
        }
        else{
            return array(
                'status' => 1,
                'data' => '
                <div class="ui red small message">
                    <i class="close icon"></i>
                    <div>
                      Su email o contraseña es incorrecta. Si no recuerdas tu contraseña, restablécela ahora.
                    </div>
                </div>'
            );
        }
    }



    public function loginAdmin($email, $psw)
    {
        $this->db->select('email');
        $this->db->from($this->table_name);
        $this->db->where('email', $email);
        $this->db->where('estado', 1); //solo activos
        $this->db->where('password', md5($psw));
        $this->db->where('admin', 1);
        $row = $this->db->get()->row();

        //var_dump($row);

        if (isset($row)) {

            return array(
                'status' => 0,
                'data' => $row
            );
        } else {
            return array(
                'status' => 1,
                'data' => '
                <div class="ui small message">
                    <!--<i class="close icon"></i>-->
                    <div>
                      Su email o contraseña es incorrecta. Si no recuerdas tu contraseña, restablécela ahora.
                    </div>
                </div>'
            );
        }
    }


    
   
    public function confirmar_registro($userId, $pwsd)
    {
        $query = $this->db->get_where($this->table_name, array('id' => $userId, 'password' => $pwsd, 'admin' => 0, 'estado' => 3), 1);
        $row = $query->row();

        if (isset($row)) 
        {
            $this->db->where('id', $userId);
            if($this->db->update($this->table_name, array('estado' => 1)))
            {
                //return 'Has confirmado exitosamente tu cuenta de correo,  <a href="'.strtolower(base_url()).'" class="active link item">iniciar sesión <i class="angle right icon"></i>';
                return 'Has confirmado exitosamente tu cuenta de correo';
            }
            else
            {
                return $this->db->error()['message'];
            }
        }
        else
        {
            return 'argumenos invalidos';
        }        
    }


    public function validateTokenPassword($token)
    {
        $query = $this->db->get_where('tokenpassword', array('token' => $token, 'estado' => 0), 1);
        $row = $query->row();
        $rest = (isset($row)) ? array('error' => 0 , 'email' => $row->email) : array('error' => '1', 'data' => 'Parametros incorrectos');
        return $rest;      
    }

}
