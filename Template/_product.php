<?php

$item_id=$_GET['item_id'];
$in_cart = $Cart->getCartId($product->getData('cart',$_SESSION['user_id']));

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Add_to_cart'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }}

 

foreach ($product->getData() as $item):
if($item['item_id']== $item_id):    
?>


<!--   product  -->
 <main id="main-site">
 <section id="product" class="py-3">
  <div class="container">
      <div class="row">
          <div class="col-sm-6">
              <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']) ?>"><img src="<?php echo $item['item_image']?>" alt="product" class="img-fluid"></a>
              
              <!-- add to cart-->
              
              <form method="post">
              <div class="form-row pt-4 font-size-16 font-baloo">
                  
                    <div class="col">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success form-control font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="Add_to_cart" class="btn btn-warning form-control font-size-12">Add to Cart</button>';
                                }
                                ?>  
                    </div>
              </div>
              </form>
            <!-- add to cart -->

          </div>
          <div class="col-sm-6 py-5">
              <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?></h5>
              <small><?php echo $item['item_brand'] ?></small>
              <hr class="m-0">

              <!---    product price       -->
                  <table class="my-3">
                      <tr class="font-rale font-size-14">
                          <td>Price in Rupees</td>
                      </tr>
                      <tr class="font-rale font-size-14">
                          <td>Deal Price:</td>
                          <td class="font-size-20 text-danger"><span><?php echo $item['item_price'] ?></span></td>
                      </tr>
                      <tr class="font-rale font-size-14">
                          <td><span class="fosize-16 text-danger">Inclusive of all taxes</span></nt-td>
                      </tr>
                  </table>
              <!---    !product price       -->

                  <hr>

              <!-- product qty section  
               <div class="row">
                   <div class="col-6">
                      
                       <div class="qty d-flex">
                           <h6 class="font-baloo">Qty</h6>
                           <div class="px-4 d-flex font-rale">
                               <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                               <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                               <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                           </div>
                       </div>
                       
                   </div>
               </div>
             !product qty section -->
              
            
          <div class="col-12">
              <h6 class="font-rubik"></br>Product Description</h6>
              <hr>
              <p class="font-rale font-size-14"><?php echo $item['item_description'] ?></p>
          </div>
          
          
          <div class="col-12">
              <h6 class="font-rubik"></br>Prescription</h6>
              <hr>
              <p class="font-rale font-size-14"><?php echo $item['item_prescription'] ?></p>
          </div>

          
      </div>
  </div>
</section>
<!--   !product  -->

<?php
endif;
endforeach;
?>