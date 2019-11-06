<?php

if(isset($_GET['edit_user'])) {
  $the_user_id = $_GET['edit_user'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  }

}
if(isset($_POST['edit_user'])) {
  // $user_id = $_POST['user_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $user_role = $_POST['user_role'];
  // $post_image = $_FILES['post_image']['name'];
  // $post_image_temp = $_FILES['post_image']['tmp_name'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $password = $_POST['password'];
  // $post_date = date('d-m-y');
  // $post_comment_count = 4;
  // move_uploaded_file($post_image_temp, "../images/$post_image");

    //下記本来ワンライナーのところ長くなるので結合させている
    $query = "UPDATE users SET ";
    $query .= "firstname  = '{$firstname}', ";
    $query .= "lastname = '{$lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email   = '{$user_email}', ";
    $query .= "password = '{$password}' ";
    $query .= "WHERE user_id = {$the_user_id}";

    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
    header("Location: users.php?source=edit_user&edit_user=$user_id");

}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" value="<?php echo $firstname ?>" class="form-control" name="firstname">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" value="<?php echo $lastname ?>" class="form-control" name="lastname">
  </div>

  <div class="form-group">
  <label for="user_role">User role</label>
  <br>
    <select name="user_role" id="">
    <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
    <?php
    if($user_role == 'admin') {
      echo "<option value='subscriber'>subscriber</option>";
    } else {
      echo "<option value='admin'>admin</option>";
    }
    ?>

    </select>
  </div>


  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image">
  </div> -->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="<?php echo $user_email ?>" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" value="<?php echo $password ?>" class="form-control" name="password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
  </div>

</form>