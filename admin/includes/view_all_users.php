<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>ユーザー名</th>
      <th>姓</th>
      <th>名</th>
      <th>メールアドレス</th>
      <th>役割</th>
      <th>管理者化</th>
      <th>非管理者化</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
  </thead>
  <tbody>

<?php

if(isset($_GET['change_to_admin'])) {
  $the_user_id = $_GET['change_to_admin'];
  $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
  $change_to_admin_query = mysqli_query($connection, $query);
  header("Location: users.php");
}


if(isset($_GET['change_to_sub'])) {
  $the_user_id = $_GET['change_to_sub'];
  $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
  $change_to_sub_query = mysqli_query($connection, $query);
  header("Location: users.php");
}

if(isset($_GET['delete'])) {
  $the_user_id = $_GET['delete'];
  $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
  $delete_user_query = mysqli_query($connection, $query);
  header("Location: users.php");
}
?>

<?php
  $query = "SELECT * FROM users";
  $select_users = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

    echo "<tr>";

    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$firstname</td>";
    echo "<td>$lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_role</td>";
    echo "<td><a href='users.php?change_to_admin={$user_id}'>管理者化</a></td>";
    echo "<td><a href='users.php?change_to_sub={$user_id}'>非管理者化</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>編集</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('削除しますか？'); \" href='users.php?delete={$user_id}'>削除</a></td>";
    echo "</tr>";
  }
?>

  </tbody>
</table>