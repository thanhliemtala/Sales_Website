<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class KidsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'kids';
	}

	public function index()
	{
		$kids = Product::getAlltypes('kids');
		$data = array('kids' => $kids);
		$this->render('index', $data);
	}
}