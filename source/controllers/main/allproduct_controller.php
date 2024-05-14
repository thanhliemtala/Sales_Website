<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class AllproductController extends BaseController
{
	function __construct()
	{
		$this->folder = 'allproduct';
	}

	public function index()
	{
		$allproduct = Product::getAll();
		$data = array('allproduct' => $allproduct);
		$this->render('index', $data);
	}
}
