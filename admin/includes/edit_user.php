<?php

if(isset($_GET['edit_user'])) {
  $the_user_id = $_GET['edit_user'];

  $query_fast = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_query = mysqli_query($connection,$query_fast);

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
  $post_date = date('d-m-y');
  // $post_comment_count = 4;
  // move_uploaded_file($post_image_temp, "../images/$post_image");

  // $query = "SELECT randSalt FROM users";
  // $select_randsalt_query = mysqli_query($connection, $query);
  // if(!$select_randsalt_query) {
  //   die("Query Failed" . mysqli_error($connection));
  // }
  // $row = mysqli_fetch_array($select_randsalt_query);
  // $salt = $row['randSalt'];
  // $hashed_password = crypt($password, $salt);


    //下記本来ワンライナーのところ長くなるので結合させている＆処理分割
    $query = "UPDATE users SET ";
    $query .= "firstname  = '{$firstname}', ";
    $query .= "lastname = '{$lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email   = '{$user_email}'";

  if(!empty($password)) {
    $query_password = "SELECT password FROM users WHERE user_id = $the_user_id";
    $get_user_query = mysqli_query($connection, $query_fast);
    confirmQuery($get_user_query);
    $row = mysqli_fetch_array($get_user_query);
    $db_user_password = $row['password'];

    if($db_user_password != $password) {
      $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    }
    $query .= ", password = '{$hashed_password}' ";
  }
    $query .= "WHERE user_id = {$the_user_id}";

    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
    // header("Location: users.php?source=edit_user&edit_user=$user_id");
    echo "<p class='bg-success'>ユーザー情報を更新しました。 <a href='users.php'>ユーザー管理画面へ</a></p>";




}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstname">姓</label>
    <input type="text" value="<?php echo $firstname ?>" class="form-control" name="firstname">
  </div>

  <div class="form-group">
    <label for="lastname">名</label>
    <input type="text" value="<?php echo $lastname ?>" class="form-control" name="lastname">
  </div>

  <div class="form-group">
  <label for="user_role">役割</label>
  <br>
    <select name="user_role" id="">
  <?php
    if($user_role == 'admin') {
      echo "<option value='admin'>管理者</option>";
      echo "<option value='subscriber'>非管理者</option>";
    } else {
      echo "<option value='subscriber'>非管理者</option>";
      echo "<option value='admin'>管理者</option>";
    }
  ?>

    </select>
  </div>


  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image">
  </div> -->

  <div class="form-group">
    <label for="username">ユーザー名</label>
    <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="email" value="<?php echo $user_email ?>" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="password">パスワード</label>（空欄の場合、以前のパスワードをお使いいただけます）
    <input type="password" value="" class="form-control" name="password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" type="submit" name="edit_user" value="更新">
  </div>

</form>