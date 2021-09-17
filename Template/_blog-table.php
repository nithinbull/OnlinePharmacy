<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Delete_from_blog'])){
        // call method deleteProduct
        $admin->deleteAdmin($_POST['blog_id'],'blogs');
    }
}
?>


<?php
$product= $admin->getDataAdmin('blogs');
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
        <th>Delete/Edit</th>
      </tr>
    </thead>

    <?php foreach($product as $item): ?>
    <tbody>
        
      <tr>
        <td><?php echo $item["blog_id"] ?></td>
        <td><?php echo $item["blog_name"] ?></td>
        <td>
        <form method="post">
                                <input type="hidden" name="blog_id" value="<?php echo $item['blog_id'] ?>" > 
                                <button type="submit" name="Delete_from_blog" class="btn font-baloo text-danger px-3"> <i class="material-icons">&#xE872;</i> </button>
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
