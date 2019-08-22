<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->userlogin)) {
			header('Location: ' .  strtolower(base_url()) . 'ingreso');
		}
		else {
			$this->load->model('Compras_model');
			$this->load->model('Ventas_model');
			$this->load->model('Lotes_model');
			$this->load->model('Proveedor_model');
			$this->load->model('Usuarios_model');
			$this->load->model('Cliente_model');
			$this->load->model('Material_model');
			$this->load->model('Stock_model');
			
		}
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
		$data['stock'] = $this->Stock_model->getStocks();
		$data['compras'] = $this->Compras_model->getAllCompras();
		$data['ventas'] = $this->Ventas_model->getAllVentas();
		$data['lotes'] = $this->Lotes_model->getAllLotes();
		//var_dump($data['lotes']);
		$this->load->view('dash', $data);
		
	}


	public function closesession()
	{
		$this->session->unset_userdata('userlogin');
		header('Location: ' .  strtolower(base_url()) . 'ingreso');
	}


	public function reporteventas()
	{
		if ($this->input->post()) 
		{
			//$this->load->view('welcome_message');
			$data['ventas'] = $this->Ventas_model->filtrarVentas($_POST);
			$data['clientes'] = $this->Cliente_model->getAllClientes();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			//var_dump($data['lotes']);
			$this->load->view('dashventas', $data);
		}
		else
		{
			//$this->load->view('welcome_message');
			$data['ventas'] = $this->Ventas_model->getAllVentas();
			$data['clientes'] = $this->Cliente_model->getAllClientes();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			//var_dump($data['lotes']);
			$this->load->view('dashventas', $data);
		}

		
	}

	public function reportecompras()
	{
		if ($this->input->post()) 
		{
			//var_dump($_POST);
			//$this->load->view('welcome_message');
			$data['compras'] = $this->Compras_model->filtrarCompras($_POST);
			$data['proveedores'] = $this->Proveedor_model->getAllProveedores();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			//var_dump($data['compras']);
			$this->load->view('dashcompras', $data);
		}
		else
		{
			//$this->load->view('welcome_message');
			$data['compras'] = $this->Compras_model->getAllCompras();
			$data['proveedores'] = $this->Proveedor_model->getAllProveedores();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$this->load->view('dashcompras', $data);
		}
	}

	public function reportelotes()
	{
		if ($this->input->post()) {
			//var_dump($_POST);

			
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['lotes'] = $this->Lotes_model->filtrarLotes($_POST);
			$data['materiales'] = $this->Material_model->getAllMateriales();

			$this->load->view('dashlotes', $data);
			
		} else{

			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['lotes'] = $this->Lotes_model->getAllLotes();
			$data['materiales'] = $this->Material_model->getAllMateriales();
			
			$this->load->view('dashlotes', $data);
		}
		
	}


	public function detalleventa($idVenta)
	{
		//$ft = $this->Ventas_model->getVenta($idVenta);
		//var_dump($ft['data']['cabecera'][0]['cliente']);
		//var_dump($ft['data']);
		
		$data['id_venta'] = $idVenta;
		$data['venta'] = $this->Ventas_model->getVenta($idVenta);
		$data['clientes'] = $this->Cliente_model->getAllClientes();
		$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
		$this->load->view('dashventadetalle', $data);
		
		
		
		
	}


}