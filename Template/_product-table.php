<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Delete_from_product'])){
        // call method deleteProduct
        echo $_POST['item_id'];
        $admin->deleteAdmin($_POST['item_id']);
    }
}
?>


<?php
$product= $admin->getDataAdmin();
?>

<!-- product table-->
</br>
<section>
<div class="container">
  <h2>Products Details</h2>
  <table class="table text-center table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Item Brand</th>
        <th>Item Price</th>
        <th>Available Quatity</th>
        <th>Delete/Edit</th>
      </tr>
    </thead>

    <?php foreach($product as $item): ?>
    <tbody>
        
      <tr>
        <td><?php echo $item["item_id"] ?></td>
        <td><?php echo $item["item_name"] ?></td>
        <td><?php echo $item["item_brand"] ?></td>
        <td><?php echo $item["item_price"] ?></td>
        <td><?php echo $item["item_quantity"] ?></td>
        <td>
        <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>" > 
                                <button type="submit" name="Delete_from_product" class="btn font-baloo text-danger px-3"> <i class="material-icons">&#xE872;</i> </button>
        </form>
        
        </td>
      </tr>
    </tbody>
    <?php
        endforeach;
    ?>

  </table>
 </div>
</section>

<!-- product table-->
