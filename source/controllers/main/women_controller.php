<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class WomenController extends BaseController
{
	function __construct()
	{
		$this->folder = 'women';
	}

	public function index()
	{
		$women = Product::getAlltypes('women');
		$data = array('women' => $women);
		$this->render('index', $data);
	}
}