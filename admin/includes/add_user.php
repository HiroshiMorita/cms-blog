<?php
if(isset($_POST['create_user'])) {
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

  $query = "INSERT INTO users(firstname, lastname, user_role, username, user_email, password)";
  $query .= "VALUES('{$firstname}', '{$lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$password}')";
  $create_user_query = mysqli_query($connection, $query);
  confirmQuery($create_user_query);

}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" name="firstname">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" name="lastname">
  </div>

  <div class="form-group">
  <label for="user_role">User role</label>
  <br>
    <select name="user_role" id="">
      <option value="subscriber">Subscriber</option>
      <option value="admin">Admin</option>
    </select>
  </div>


  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image">
  </div> -->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>

</form>