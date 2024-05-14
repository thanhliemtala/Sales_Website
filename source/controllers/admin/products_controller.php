<?php
require_once('controllers/admin/base_controller.php');
require_once('models/product.php');


class ProductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
        $products = Product::getAll();
        $data = array('products' => $products);
        $this->render('index', $data);
	}
    public function add(){
        $id = $_POST['id'];
        $name = $_POST['name']; 
        $price = $_POST['price'];
        $note = $_POST['note'];
        $sub = $_POST['sub'];
        $img = $_POST['img'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $style = $_POST['style'];
        Product::insert($id, $name, $price, $note, $sub, $img, $type, $color, $style);
        header('Location: index.php?page=admin&controller=products&action=index');
    }
    public function edit(){
        Product::insert($_POST['id'], $_POST['name'], $_POST['price'], $_POST['note'], $_POST['sub'], $_POST['img'], $_POST['type'], $_POST['style'], $_POST['color']);
        header('Location: index.php?page=admin&controller=products&action=index');
        
    }
    public function delete(){
        $id = $_POST['id'];
        Product::delete($id);
        header('Location: index.php?page=admin&controller=products&action=index');
    }
}
