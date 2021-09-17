<?php
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Add_to_cart'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart',$_SESSION['user_id']));
?>

<!-- Product shuffle-->
<section id="product-shuffle">
  <div class="container">
    <h4 class="font-rubik font-size-20">Products</h4>
    

    <div class="grid">
      <?php foreach($product_shuffle as $item){ ?>
      <div class="grid-item border" style="margin-right : 1.2rem ; margin-top : 1rem;">
        <div class="item py-2" style="width: 200px;">
         <div class="product">
           <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']) ?>"><img src="<?php echo $item["item_image"] ?>" style="width:200px; height :200px; " alt="product1" class="img-fluid"></a>
           <div class="text-center">
             <h6><?php echo $item["item_brand"] ?>'s <?php echo $item["item_name"] ?></h6>
             <div class="price py-2">
               <span><?php echo $item["item_price"] ?></span>
             </div>
             <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="Add_to_cart" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
            </form>
           </div>
         </div>
       </div>
       </div>
       <?php } ?>
    </div>
</section>
<!-- !Product shuffle -->
    