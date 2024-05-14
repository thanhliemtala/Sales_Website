<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class SearchresultController extends BaseController
{
	function __construct()
	{
		$this->folder = 'searchresult';
	}

	public function index()
	{
        if (isset($_POST['search_term'])) {
            // User has submitted a search
            $searchTerm = $_POST['search_term'];
            
            // Perform your search logic here using the $searchTerm
            // For example, query your database for matching products and display results          
            $searchresult = Product::search($searchTerm);
            $data = array('searchresult' => $searchresult);
	    $this->render('index', $data);
        }
		
	}
}
