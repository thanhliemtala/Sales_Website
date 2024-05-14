<?php
include_once('views/main/nav.php');
if (!isset($_SESSION['guest']))
  {
    header('Location: index.php?page=main&controller=login&action=index');
  }
?>
<div class="container-xl">
        <div class="row justify-content-center ">
          <div class="col-lg-8 bg-white">
            <div class="h4 mb-3">Giỏ hàng</div>
            <div class="bag-content vstack">
                <?php if(sizeof($orders) == 0) {
                  echo '
                  
                  <div class="card mb-3 border-0 border-bottom rounded-2 bg-light" style="width: 100%;">
                        <div class="row g-0 text-center pt-5 pb-3">
                          <img class="mx-auto" src="https://img.freepik.com/free-vector/sticker-empty-box-opened-white-background_1308-68243.jpg?w=1800&t=st=1692044830~exp=1692045430~hmac=e5ba092a1f83a0cd16f4eab6e8f06a4f838dab6b67802b4255e45b06e5282876" style="width:150px; opacity:0.5;">
                          <p style="opacity:2;">There are no thing here.  <a href="#" >Buy now</a></p>
                   
                        </div>
                     
                  </div>
                  ';
                }
                else {
                foreach($orders as $order) 
                    echo '
                      <div class="card mb-3 border-0 border-bottom rounded-0" style="width: 100%;">
                          <div class="row g-0">
                              <div class="col-3 col-lg-4">
                                  <img src="'.$order->img.'" width="150px" height="150px" class="img-fluid rounded-start" alt="...">
                              </div>
                              <div class="col-9 col-lg-8">
                                  <div class="card-body py-0">
                                      <div class="d-flex justify-content-between">
                                          <h5 class="card-title"><a target="_blank" href=index.php?page=main&controller=product&action=index&product_id='.$order->product_id.'>'.$order->name.'</a></h5>
                                          <p class="card-text ">'.$order->price.'</p>
                                      </div> 
                                      <p class="card-text mb-1">Màu sắc:  '.$order->color.'</p>
                                      <p class="card-text mb-1">Kiểu:  '.$order->style.'</p>
                                      <p class="card-text mb-1">Số lượng:  '.$order->num.'</p>
                                          
                                             
                                      <button type="button" class="btn btn-light bg-white" data-bs-toggle="modal" data-bs-target="#DeleteOrder"><i class="fa-solid fa-trash-can"></i></button>
                                      
                                      <div class="modal fade" id="DeleteOrder" tabindex="-1" role="dialog" aria-labelledby="DeleteOrderModal" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title">Xóa vật phẩm</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="index.php?page=main&controller=cart&action=delete" method="post">
                                                <div class="modal-body">
                                                  <input type="hidden" name="product_id" value="'.$order->product_id.'" />
                      
                                                  <p>Bạn có chắc muốn xóa vật phẩm này này?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button class="btn btn-dark btn-outline-light" type="button" data-dismiss="modal">Hủy</button>
                                                  <button class="btn btn-danger btn-outline-light" type="submit">Xóa</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                    ';
                }
                ?>
            </div>         
          </div>
          
          <div class="col-lg-4 bg-white">
            <div class="row mb-4">
              <h3>Tổng hóa đơn</h3>
            </div>

            <div class="row justify-content-between">
              <div class="col-auto">Tổng tiền hàng</div> 
              <div class="col-auto"><?php echo $sum?>đ</div>
            </div>

            <div class="row justify-content-between my-3">
              <div class="col-auto">Phí xử lý và vận chuyển</div> 
              <div class="col-auto">20000đ</div>   
            </div>

            <div class="d-none d-sm-block border-bottom"></div>

            <div class="row justify-content-between my-3 ">
              <div class="col-auto">Tổng thanh toán</div> 
              <div class="col-auto"><?php echo ($sum + 20000) ?>đ</div>   
            </div>
            
            <div class="d-none d-sm-block border-bottom"></div>
            
            <form action="index.php?page=main&controller=checkout&action=index" method="post">
              <input type="hidden" name="user_id" value="<?php echo $user_id?>">
              
              <button type=<?php if($sum == 0) echo "button"; else echo "submit"?> onclick=<?php if($sum == 0) echo "emptyCart()"; else echo "none";?> class="d-block w-100 btn btn-dark rounded-pill fw-semibold py-3 mt-3">Thanh toán</button>
            </form>
          </div>
        </div>
</div>
<script>
  function emptyCart() {
    alert("Your cart is empty");
  }
</script>

<?php
include_once('views/main/footer.php');
?>
