<?php
$users= $admin->getDataAdmin('user');

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Delete_from_user'])){
        // call method deleteUser..
        $admin->deleteAdmin($_POST['user_id'],'user');
    }
}
?>


<!-- product table-->
</br>
<section>
<div class="container">
  <h2>Users </h2>
  <table class="table text-center table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>User Type</th>
        <th>Delete/Edit</th>
      </tr>
    </thead>

    <?php foreach($users as $user): ?>
    <tbody>
      <tr>
        <td><?php echo $user["user_id"] ?></td>
        <td><?php echo $user["first_name"] ?></td>
        <td><?php echo $user["last_name"] ?></td>
        <td><?php echo $user["user_mail"] ?></td>
        <td><?php echo $user["user_type"] ?></td>
        <?php 
        if($user['user_type']=='user'){
          echo '<td><form method="post">';
          echo '<input type="hidden" name="user_id" value="'.$user["user_id"].'">';
          echo '<button type="submit" name="Delete_from_user" class="btn font-baloo text-danger px-3"><i class="material-icons"> &#xE872; </i> </button>';
          echo '</form></td>'; 
          }
         else
         echo '<td><a style="text-decoration : none;" class="delete" title="Delete" href="#">-Admin-</td>';
         ?>
      </tr>
    </tbody>
    <?php
        endforeach;
    ?>

  </table>
 </div>
</section>

<!-- product table-->
