<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brain Log</title>

    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>

    <!-- ログイン -->
<?php
    if(isset($_SESSION['user_role'])) {
        echo "<div class='session'></div>";
    }
?>
<div class="well login">
    <h4>LOGIN</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="ユーザー名">
    </div>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="パスワード">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type="submit">ログイン</button>
        </span>
    </div>
    </form>
</div>