

<?php
$product= $admin->getDataAdmin('orders');
?>

<!-- product table-->
</br>
<section>
<div class="container">
  <h2>Orders List</h2>
  <table class="table text-center table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Item ID</th>
        <th>Order Quantity</th>
      </tr>
    </thead>

    <?php foreach($product as $item): ?>
    <tbody>
        
      <tr>
        <td><?php echo $item["order_id"] ?></td>
        <td><?php echo $item["user_id"] ?></td>
        <td><?php echo $item["item_id"] ?></td>
        <td><?php echo $item["order_quantity"] ?></td>
      </tr>
    </tbody>
    <?php
        endforeach;
    ?>

  </table>
 </div>
</section>

<!-- product table-->
