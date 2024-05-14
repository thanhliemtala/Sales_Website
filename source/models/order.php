<?php
require_once('connection.php');
require_once('product.php');
class Order {
    public $product_id;
    public $name;
    public $price;
    public $description;
    public $category;
    public $color;
    public $style;
    public $img;
    public $num;

    public function __construct($product_id, $name, $price, $description, $category, $color, $style, $img, $num){
        $this->product_id = $product_id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->color = $color;
        $this->style = $style;
        $this->img = $img;
        $this->num = $num;
    }
   
    static function getAll($user_id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM `order` JOIN `product` ON pid = id WHERE iduser = '$user_id'");
         $orders = [];
         while ($row = $req->fetch_assoc()) 
         {
             $orders[] = new Order(
                $row['id'],
                $row['product_name'],
                $row['product_price'],
                $row['product_note'],
                $row['types'],
                $row['color'],
                $row['style'],
                $row['image_path'],
                $row['num']
             );
        }
        return $orders;
    }
    static function add($user_id, $product_id, $num){
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM `order` WHERE iduser = '$user_id' AND pid = '$product_id'");
        if($db->affected_rows > 0) {
            $row = $req->fetch_assoc();
            
            Order::update($user_id, $product_id, $row['num'] + $num);
        }
        else {
            
            Order::insert($user_id, $product_id, $num);
        }
    }

    
    static function insert($user_id, $product_id, $num)
    {
        $db = DB::getInstance();
        $req = $db->query("INSERT INTO `order`(`iduser`, `num`, `pid`) VALUES ('$user_id','$num','$product_id')");
        
    }
    static function update($user_id, $product_id, $newNum) {
        echo $newNum;
        $db = DB::getInstance();
        $req = $db->query(
            "UPDATE `order` SET num = '$newNum' WHERE iduser = '$user_id' AND pid = '$product_id';");
    }
    static function delete($user_id, $product_id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM `order` WHERE iduser = '$user_id' AND pid = '$product_id';");
    }
    static function sum($user_id){
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM (`order` JOIN `product` ON pid = id) WHERE iduser = '$user_id'");
        $sum = 0;
        while($row = $req->fetch_assoc()){
            $sum += $row['product_price'] * $row['num'];
        }
        return $sum;
    }
    static function checkout($user_id) {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM `order` WHERE iduser = '$user_id'");
    }
    static function decrease($user_id, $product_id){
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM order WHERE iduser = '$user_id' AND idproduct = '$product_id'");
        $row = $req->fetch_assoc();
        $newNum =  $row['num'] - 1;
        if($newNum > 0) {
            Order::update($user_id, $product_id, $newNum);
        }
        else {
            Order::delete($user_id, $product_id);
        }
    }
}
?>