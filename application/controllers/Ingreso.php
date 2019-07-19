<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {




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

		if ($this->input->post()) {
			$data = $this->Usuarios_model->loginAdmin($_POST['email'], $_POST['psswd']);
			if ($data['status'] == 0) {
				$this->session->unset_userdata('userlogin');
				$this->session->set_userdata('userlogin', $data['data']);
				header('Location: ' . strtolower(base_url()) . 'dashboard');
			} else {
				$data['user'] = $_POST['email'];
				$this->load->view('login', $data);
			}
		} else {
			$user = $this->session->userdata('userlogin');
			if (isset($this->session->userlogin)) {
				//var_dump($user);
				header('Location: ' . strtolower(base_url()) . 'dashboard');
			} else {
				$data['user'] = '';
				$this->load->view('login', $data);
			}
		}
	}


	
}
