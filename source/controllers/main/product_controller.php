<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');
require_once('models/review.php');


class ProductController extends BaseController
{
	function __construct()
	{
		$this->folder = 'product';
	}

	public function index()
	{
		
        session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		}
		// session_destroy();
		
    	
        $product_id = $_REQUEST['product_id'];

        $product = Product::get($product_id);
		$reviews = Review::getAll($product_id);
        $data = array('product' => $product, 'reviews' => $reviews);
		$this->render('index', $data);
	}
	public function insertReview(){

		////////////////////////////
		
		session_start();
		
		if(isset($_SESSION["guest"])){
			$user_id = $_SESSION['guest'];
		// }
		// session_destroy();
		
		$product_id = $_REQUEST['product_id'];
		$content = $_POST['content'];
		//echo $content, $user_id, $product_id;
		Review::insert($content, $user_id, $product_id);
		header('Location: index.php?page=main&controller=product&action=index&product_id='.$product_id);
		} else {
			header('Location: index.php?page=main&controller=login&action=index');
		}
	}

}

?>
