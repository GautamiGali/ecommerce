<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

	public function index()
	{
		
		$result = $this->Product_model->get_products();
		//print_r($result);exit;
		$count = 0;
		if(!empty($this->session->userdata('cart'))){
			$count = (Array)$this->session->userdata('cart');
			$count = count($count);
		}
		$this->load->view('index', array('products' => $result, 'count' => $count));
	}

	public function getProduct()
	{
		$product_id = $this->input->post('id');
		$result = $this->Product_model->get_product_detail($product_id);
		$cart = $this->session->userdata('cart');
		$quantity = 1;
		if(!empty($cart) && array_key_exists($product_id, $cart)){
			$quantity = $cart[$product_id];
		}
		echo json_encode(array('data' => $result, 'quantity' => $quantity));exit;
	}

	public function addProduct()
	{
		$data = [];
		$data['size'] = $this->input->post('size');
		$data['product_id'] = $this->input->post('id');
		$data['quantity'] = $this->input->post('quantity');
		$data['size'] = $this->input->post('size');
		$data['user_type'] = "guest";
		date_default_timezone_set("Asia/Kolkata");
		$date =  Date('Y-m-d h:i:s');
		$data['created_at'] = $date;
		$product_id = $this->Product_model->addToCart($data);
		if(!empty($product_id)){
			echo json_encode(array("status" => "success"));exit;
		} else {
			echo json_encode(array("status" => "failed"));exit;
		}

		/*if(!empty($cart)){
			$cart[$product_id] = $quantity;
			$this->session->set_userdata('cart', $cart);
		}else{
			  $cart = array();
			  $cart[$product_id] = $quantity;
		      $this->session->set_userdata('cart', $cart); 
		}
		$count = (Array)$this->session->userdata('cart');
		echo count($count); exit;*/

	}

	public function checkOut()
	{
		$cart = $this->session->userdata('cart');
		$products = array();
		if(!empty($cart)) {
			$productIds = array_keys($cart);
			$products = (Array)$this->Product_model->getProductByIds($productIds);
			foreach ($products as $key => $value) {
				$products[$key]->quantity = $cart[$value->id];
			}

		}
		$count = (Array)$this->session->userdata('cart');
		$count = count($count);
		$this->load->view('checkout', array('products' => $products, 'count' => $count));
	}
	public function success()
	{	
		$this->session->unset_userdata('cart');
		$this->load->view('success', array('count' => 0));
	}
}
