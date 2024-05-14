<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class MenController extends BaseController
{
	function __construct()
	{
		$this->folder = 'men';
	}

	public function index()
	{
		$men = Product::getAlltypes('men');
		$data = array('men' => $men);
		$this->render('index', $data);
	}
}
