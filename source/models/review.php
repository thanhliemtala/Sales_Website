<?php
    require_once("connection.php");
    class Review {
        public $content;
        public $fname;
        public $lname;
        public $date;

        public function __construct($content, $fname, $lname, $date){
            $this->content = $content;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->date = $date;
        }
        static function getAll($product_id)
        {
            $db = DB::getInstance();
            $req = $db->query("SELECT *
                FROM (`review` JOIN `product` ON pid = id) JOIN `user` ON uid = email
                WHERE pid = $product_id;");
                $reviews = [];
             while ($row = $req->fetch_assoc()) 
             {
                 $reviews[] = new Review(
                    $row['content'],
                    $row['fname'],
                    $row['lname'],
                    $row['date']
                 );
            }
            return $reviews;
        }
        static function insert($content,$user_id,$product_id) {
            
            $db = DB::getInstance();
            $req = $db->query("INSERT INTO `review`(`content`, `uid`, `pid`, `date`) 
            VALUES 
            ('$content', '$user_id', '$product_id', CURDATE())");
            
        }
        static function delete($review_id) {
            $db = DB::getInstance();
            $req = $db->query("DELETE FROM review WHERE review_id = '$review_id';");
            
        }
        
    }
?>