<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class CheckoutController extends BaseController
{
	function __construct()
	{
		$this->folder = 'checkout';
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
	public function check(){
        $phone = $_POST["phone"];
		
		if(preg_match('/^[0-9]{10}+$/', $phone)) {
			session_start();
			
			if(isset($_SESSION["guest"])){
				$user_id = $_SESSION['guest'];
			}
			// session_destroy();
			Order::checkout($user_id);
			header('Location: index.php?page=main&controller=success&action=index');
		} else {
			//header('Location: index.php?page=main&controller=checkout&action=index');
		    echo '<script language="javascript">alert("Invalid Phone Number");
			</script>';
			
		}
    }

	
	
}

?>
