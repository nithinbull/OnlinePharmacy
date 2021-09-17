<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Delete_from_cart'])){
        // call method deleteCart
        $Cart->deleteCart($_POST['item_id'],$_SESSION['user_id']);
    }
}

  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Place_Order'])){
        // call method addToCart
        //$order_id=1+count($product->getData('orders',$_SESSION['user_id']));
        $result=$Cart->placeOrder($_POST['user_id']);
        if($result)
        {
            header('location:order-success.php');
        }
    }
}

?>


<!-- Shopping cart section  -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                             
            <?php
                    foreach ($product->getData('cart',$_SESSION['user_id']) as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[]=array_map(function ($item){
            ?>
             <!-- cart item -->
            <div class="row border-top py-3 mt-3">
                <div class="col-sm-2">
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']) ?>"><img src="<?php echo $item['item_image'] ?>" style="height: 120px;" alt="cart1" class="img-fluid"></a>
                </div>
                <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?></h5>
                        <small><?php echo $item['item_brand'] ?></small>

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                               <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>" > 
                                <button type="submit" name="Delete_from_cart" class="btn font-baloo text-danger px-3 border-right">Delete from Cart</button>
                               </form>
                        </div>
                        <!-- !product qty -->

                        </div>

                        <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <span class="product_price"><?php echo $item['item_price'] ?></span>
                        </div>
                        </div>
                        </div>
                <!-- !cart item -->
                        <?php 
                        return $item['item_price'];    
                    },$cart);
                            endforeach;
                        ?>
                          </div>
                          <!-- subtotal section-->
                          <div class="col-sm-3">
                              <div class="sub-total border text-center mt-2">
                                  
                                  <div class="border-top py-4">
                                      <h5 class="font-baloo font-size-20">Total :&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0 ; ?></span> </span> </h5>
                                       
                                      <form method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                        <button type="submit" name="Place_Order" class="btn btn-danger mt-3">Proceed to checkout</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <!-- !subtotal section-->
                      </div>
                  <!--  !shopping cart items   -->
              </div>
          </section>
      <!-- !Shopping cart section  -->