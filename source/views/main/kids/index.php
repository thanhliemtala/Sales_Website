<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Nike. Just Do It</title>
    <style>
      body{
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      }
      .no-underline {
            text-decoration: none !important;
        }
        .note{
            color: #9E3500;
        }
        .card{
            border: none;
        }
        .price{
            font-size: 14px;
        }
    </style>
</head>

<body>


<?php include 'views/main/nav.php' ?>
<!--  -->
<?php require_once("models/product.php"); 
    // set-up for pagination
    $productsPerPage = 9; // Số sản phẩm trên mỗi trang
    $totalProduct = count($kids); // Tổng số sản phẩm
    $totalPages = ceil($totalProduct / $productsPerPage); // Tổng số trang

    
    $currentPage = isset($_GET['product_page']) ? intval($_GET['product_page']) : 1;
    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    $startIndex = ($currentPage - 1) * $productsPerPage;
    $endIndex = min($startIndex + $productsPerPage, $totalProduct);
?>


<div class="container-fluid">
    <div class="title my-4">
        <h4>Trẻ em<?php 
        $totalProduct = count($kids);
        echo " (".$totalProduct .")";
        ?></h4> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-12" id="category">
            <div class="d-flex flex-lg-column">
                <a href="#" class = "text-dark no-underline mr-3 mb-lg-3">Giày</a>
                <a href="#" class = "text-dark no-underline mr-3 mb-lg-3">Quần áo</a>
                <a href="#" class = "text-dark no-underline mr-3 mb-lg-3">Phụ kiện</a>
            </div>
            <hr class ="d-lg-none">
        </div>
        <div class="col-lg-9 px-0" id="kids-galery">
            <div class="container-fluid px-0 mx-0" id="product-container">

                <div class="row">
                <?php  
                    for($i = $startIndex; $i < $endIndex; $i++){
                        $value = $kids[$i];
                    echo "<div class='col-6 col-lg-4 px-1'>";
                    echo "<div class='card border-0'>";
                    echo "<img src='".$value->image_path."' alt='' loading='lazy'>";
                    echo "<div class='card-body mx-0 my-2 py-0'>";
                    echo  "<p class='card-text note my-0'>".$value->product_note."</p>";
                    echo "<a href='index.php?page=main&controller=product&action=index&product_id=".$value->id."' class = 'text-dark no-underline'><h5 class='card-title product-name product-name'>".$value->product_name."</h5></a>";
                    echo  "<p class='card-text text-secondary kids-type'>".$value->product_subcategory."</p>";
                    echo "<p class='card-text price mt-2'>".$value->product_price."đ</p>";
                    echo "</div></div></div>";
                    }
                    ?>


                </div>
                
            </div>
        </div>
    </div>
    <!-- Component phân trang -->
    <div class="pagination justify-content-end mt-4 mx-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                for ($page = 1; $page <= $totalPages; $page++) {
                    $isActive = $page === $currentPage ? 'active' : '';
                    echo '<li class="page-item ' . $isActive . '"><a class="page-link" href="?page=main&controller=kids&action=index&product_page=' . $page . '">' . $page . '</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

<!--  -->
<?php include 'views/main/footer.php' ?>
</body>
</html>
