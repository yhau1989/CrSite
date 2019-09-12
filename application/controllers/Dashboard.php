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
			$this->load->model('Odt_model');
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
		$user = $this->session->userdata('userlogin');
		if (isset($this->session->userlogin)) {
			$data['stock'] = $this->Stock_model->getStocks();
			$data['compras'] = $this->Compras_model->getAllCompras(1);
			$data['ventas'] = $this->Ventas_model->getAllVentas(1);
			$data['odt'] = $this->Odt_model->getAllODT(1);
			$this->load->view('dash', $data);
		} else {
			header('Location: ' .  strtolower(base_url()) . 'ingreso');
		}



	
	}

	private function validateLogin()
	{
		$user = $this->session->userdata('userlogin');
		if (!isset($this->session->userlogin)) {
			header('Location: ' .  strtolower(base_url()) . 'ingreso');
		}
	}
	

	public function closesession()
	{
		$this->session->unset_userdata('userlogin');
		header('Location: ' .  strtolower(base_url()) . 'ingreso');
	}


	public function reporteventas()
	{
		$this->validateLogin();

		if ($this->input->post()) 
		{
			$data['ventas'] = $this->Ventas_model->filtrarVentas($_POST);
			$data['sumatorias'] = $this->sumReportVentas($data['ventas']);
			$data['clientes'] = $this->Cliente_model->getAllClientes();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$this->load->view('dashventas', $data);
		}
		else
		{
			$data['ventas'] = $this->Ventas_model->getAllVentas();
			$data['sumatorias'] = $this->sumReportVentas($data['ventas']);
			$data['clientes'] = $this->Cliente_model->getAllClientes();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			
			$this->load->view('dashventas', $data);
		}
	}

	private function sumReportVentas($ventas)
	{
		$sumValor = 0;
		if ($ventas['status'] == 0) {
			foreach ($ventas['data'] as $clave => $valor) {
				$sumValor = $sumValor + $valor['valor_total'];
			}
			return array('sumValor' => $sumValor);
		} else {
			return array('sumValor' => '0.00');
		}
	}


	public function reportecompras()
	{
		$this->validateLogin();
		if ($this->input->post()) 
		{			
			$data['compras'] = $this->Compras_model->filtrarCompras($_POST);
			$data['sumatorias'] = $this->sumReportCompras($data['compras']);
			$data['proveedores'] = $this->Proveedor_model->getAllProveedores();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$this->load->view('dashcompras', $data);
			
		}
		else
		{
			$data['compras'] = $this->Compras_model->getAllCompras();
			$data['sumatorias'] = $this->sumReportCompras($data['compras']);
			$data['proveedores'] = $this->Proveedor_model->getAllProveedores();
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$this->load->view('dashcompras', $data);
		}
	}

	private function sumReportCompras($compras)
	{
		$sumValor = 0;
		$sumPeso = 0;
		if ($compras['status'] == 0){
			foreach ($compras['data'] as $clave => $valor) {
				$sumValor = $sumValor + $valor['valor_total'];
				$sumPeso = $sumPeso + $valor['peso_total'];
			}
			return array('sumValor' => $sumValor, 'sumPeso' => $sumPeso);
		}else
		{
			return array('sumValor' => '0.00', 'sumPeso' => '0.00');
		}
	}




	public function reportelotes()
	{
		$this->validateLogin();
		if ($this->input->post()) {

			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['lotes'] = $this->Lotes_model->filtrarLotes($_POST);
			$data['sumatorias'] = $this->sumReportLotes($data['lotes']);
			$data['materiales'] = $this->Material_model->getAllMateriales();

			$this->load->view('dashlotes', $data);
			
		} else{

			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['lotes'] = $this->Lotes_model->getAllLotes();
			$data['sumatorias'] = $this->sumReportLotes($data['lotes']);
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashlotes', $data);
		}	
	}

	private function sumReportLotes($lotes)
	{
		
		$sumPeso = 0;
		if ($lotes['status'] == 0){
			foreach ($lotes['data'] as $clave => $valor) {
				$sumPeso = $sumPeso + $valor['peso'];
			}
			return array('sumPeso' => $sumPeso);
		}else
		{
			return array('sumPeso' => '0.00');
		}
	}

	public function reporteodt()
	{
		$this->validateLogin();
		if ($this->input->post()) {
			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['odt'] = $this->Odt_model->filtrarODT($_POST);
			$data['sumatorias'] = $this->sumReportOdt($data['odt']);
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashodt', $data);
			
		} else{

			$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
			$data['odt'] = $this->Odt_model->getAllODT();
			$data['sumatorias'] = $this->sumReportOdt($data['odt']);
			$data['materiales'] = $this->Material_model->getAllMateriales();
			
			$this->load->view('dashodt', $data);
		}
		
	}

	private function sumReportOdt($odts)
	{
		$sumPeso = 0;
		$sumFaltante = 0;
		$sumAlmacenado = 0;
		if ($odts['status'] == 0) {
			foreach ($odts['data'] as $clave => $valor) {
				$sumPeso = $sumPeso + $valor['peso_total'];
				$sumFaltante = $sumFaltante + $valor['faltante'];
				$sumAlmacenado = $sumAlmacenado + ($valor['peso_total'] - $valor['faltante']);
			}
			return array('sumPeso' => $sumPeso, 'sumFaltante' => $sumFaltante, 'sumAlmacenado' => $sumAlmacenado);
		} else {
			return array('sumPeso' => '0.00', 'sumFaltante' => '0.00');
		}
	}


	public function detalleventa($idVenta=null)
	{
		$this->validateLogin();
		try {
			if (!isset($idVenta) || $idVenta <= 0) {
				header('Location: ' .  strtolower(base_url()) . 'dashboard/reporteventas');
			}
		} catch (Exception $th) {
			header('Location: ' .  strtolower(base_url()) . 'dashboard/reporteventas');
		}

		$data['id_venta'] = $idVenta;
		$data['venta'] = $this->Ventas_model->getVenta($idVenta);
		$data['clientes'] = $this->Cliente_model->getAllClientes();
		$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
		$this->load->view('dashventadetalle', $data);
	}

	

	public function detallecompra($idcompra=null)
	{
		$this->validateLogin();
		try {
			if (!isset($idcompra) || $idcompra <= 0) {
				header('Location: ' .  strtolower(base_url()) . 'dashboard/reporteventas');
			}
		} catch (Exception $th) {
			header('Location: ' .  strtolower(base_url()) . 'dashboard/reporteventas');
		}

		$data['id_compra'] = $idcompra;
		$data['compras'] = $this->Compras_model->getCompra($idcompra);
		$data['clientes'] = $this->Cliente_model->getAllClientes();
		$data['usuarios'] = $this->Usuarios_model->getAllUsuariosList();
		//var_dump($data['compras']['data']['cabecera']);
		$this->load->view('dashcompradetalle', $data);
	}


	public function reportecomprasporproductos()
	{
		$this->validateLogin();
		if ($this->input->post()) {
			$data['compras'] = $this->Compras_model->comprasPorProductos($_POST);
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashcomprasproductos', $data);
			
		} else {
			$data['compras'] = $this->Compras_model->comprasPorProductos();
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashcomprasproductos', $data);
		}
		
		
	}

	public function reporteventasporproductos()
	{
		$this->validateLogin();
		if ($this->input->post()) {
			$data['ventas'] = $this->Ventas_model->ventasPorProducto($_POST);
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashventasproductos', $data);
		} else {
			$data['ventas'] = $this->Ventas_model->ventasPorProducto();
			$data['materiales'] = $this->Material_model->getAllMateriales();
			$this->load->view('dashventasproductos', $data);
		}
	}

	


	


}