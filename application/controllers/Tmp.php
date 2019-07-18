<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tmp extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('tmp');
	}

	/*Confirmacion de correo (Suscripcion)*/
	public function confirmacion($idUser = null, $passw = null)
	{
		//$this->Usuarios_model->confirmar_registro($idUser, $passw);
		$data['msg'] = (isset($idUser) && isset($passw)) ? $this->Usuarios_model->confirmar_registro($idUser, $passw): '' ;
		$data['titulo'] = (strlen($data['msg']) > 0) ? '<h1>Confirmación de registro</h1>' : '';
		$this->load->view('tmp',$data);
		//$this->load->view('welcome_message');
		
	}

	/*Cambio de contraseña del usuario*/
	public function rst($token = null)
	{
		$data = array('email' => '', 'mensaje' => '');
		
		if(isset($token))
		{	

			$datosToken = $this->Usuarios_model->validateTokenPassword($token);
			if($datosToken['error'] == 1)
			{
				$data['mensaje'] = $datosToken['data'];
			}
			else
			{
				$data['email'] = $datosToken['email'];
				
			}
			
			$this->load->view('reset_password',$data);
		}
		else
		{
			$this->load->view('reset_password',$data);
		}	
	}





}
