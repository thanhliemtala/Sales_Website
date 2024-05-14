<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class SuccessController extends BaseController
{
	function __construct()
	{
		$this->folder = 'success';
	}
	
	public function index()
	{
		$this->render('index');
	}
	
	
}

?>
