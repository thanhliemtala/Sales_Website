<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class CartController extends BaseController
{
	function __construct()
	{
		$this->folder = 'cart';
	}
	
	public function index()
	{
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		
		
		$orders = Order::getAll($user_id);
		$sum = Order::sum($user_id);
		$data = array('orders' => $orders, 'sum' => $sum);
		$this->render('index', $data);
	}
	public function add()
	{
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		
		$product_id = $_REQUEST['product_id'];
		$num = $_POST['num'];
		Order::add($user_id, $product_id, $num);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function decrease(){
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		$product_id = $_REQUEST['product_id'];
		Order::decrease($product_id, $user_id);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function addHidden()
	{
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		$product_id = $_REQUEST['product_id'];
		$num = $_POST['num'];
		Order::add($user_id, $product_id, $num);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	public function delete() {
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		$product_id = $_REQUEST['product_id'];
		Order::delete( $user_id,$product_id);
		header('Location: index.php?page=main&controller=cart&action=index');
	}
	
}

?>
