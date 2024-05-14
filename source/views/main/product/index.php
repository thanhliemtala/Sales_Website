
  <!-- ======= Breadcrumbs ======= -->
  <?php include 'views/main/nav.php' ?>
  <main id="main">
  <div class="container-xl">
        <div class="row mx-5 mb-2">
            
            <div class="col-lg-6">
                <a href=""><img class="img-fluid" src="<?php echo $product->image_path;?>" alt=""></a>
            </div>
            <div class="col-lg-6">
                <h3><?php echo $product->product_name;?></h3>
                <!-- <h5><?php echo $product->types ."/". $product->product_subcategory;?></h5> -->
                <h5><?php echo $product->product_subcategory;?></h5>
                <h5 class="mt-3 mb-5"><?php echo $product->product_price;?>đ</h5>
                
                
                <div class="row">
                    <form action="index.php?page=main&controller=cart&action=addHidden" method="post">
                    <div class="input-group input-group-lg rounded-pill">
                        <span class="input-group-text fw-semibold" id="inputGroup-sizing-lg">Số lượng</span>
                        <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
                        <input name="num" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"  value="1">
                    </div>
                        <button type="submit" class="d-block w-100 btn btn-dark rounded-pill fw-semibold py-3 my-3" id="addCart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
                

                <p class="decription lh-lg fw-semibold"><?php echo $product->product_note;?></p>
                <ul>
                    <li>Màu sắc: <?php echo $product->color; ?></li>
                    <li>Kiểu: <?php echo $product->style; ?></li>
                </ul>
            </div>
        </div>
        
        <div class="row mt-2 mx-5">
            
            <div class="col">
            <div class="d-none d-sm-block border-bottom border-2 mb-4"></div>
                <p class="d-inline-flex gap-1">
                    <a  class="link-secondary link-underline-opacity-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <h5 class ="d-inline">Đánh giá</h5>
 
                    </a>
                    <span class="badge text-bg-secondary"><?php echo sizeof($reviews)?></span>
                </p>
                <div class="collapse" id="collapseExample">
                    <?php
                        foreach($reviews as $review){
                    ?>
                    <div class="card card-body mb-2 bg-body-tertiary border-0">
                        <h5 class="card-title"><?php echo $review->fname. " " .$review->lname ?></h5>
                        <p class="card-text"><?php echo $review->content?></p>
                        <small><?php echo $review->date?></small>
                    </div>
                    <?php }?>
                </div>
            <div class="d-none d-sm-block border-bottom border-2 mb-3 "></div>                

                <form action="index.php?page=main&controller=product&action=insertReview" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product->id?>">
                    <div class="input-group mb-3">
                        <input type="text" name="content" class="form-control" placeholder="Viết đánh giá của bạn về sản phẩm này" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Viết đánh giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
  </main><!-- End #main -->
  <?php include 'views/main/footer.php' ?>