<?php
include 'views/main/nav.php';
require_once('models/product.php');
?>
<div class="container-fluid my-2">
    <div class="title my-4">
        
            <h4>
            Kết quả tìm kiếm <?php  
            if (count($searchresult) == 0)
                echo "(Không tìm thấy sản phẩm phù hợp!)";
            else echo "(". count($searchresult) .")";
            ?>
            </h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-12">
        </div>
        <div class="col-lg-9 px-0">
            <div class="row">
        <?php
            foreach ($searchresult as $value) {
            echo "<div class='col-12 col-sm-6 col-lg-4 px-1'>";
            echo "<div class='card border-0'>
                        <img src='". $value->image_path."' alt='' loading='lazy'>
                        <div class='card-body mx-0 my-2 py-0'>
                            <p class='card-text note my-0'>".$value->product_note."</p>
                            <a href='index.php?page=main&controller=product&action=index&product_id=".$value->id."' class='text-dark no-underline'>
                                <h5 class='card-title product-name'>".$value->product_name."</h5>
                            </a>
                            <p class='card-text text-secondary clothing-type'>".$value->product_subcategory."</p>
                            <p class='card-text price mt-2'>".$value->product_price."đ</p>
                        </div>
                    </div>
                </div>";
            }
        ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'views/main/footer.php';
?>
