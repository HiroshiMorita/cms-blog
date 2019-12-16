<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"></div>


<?php
if(isset($_GET['source'])){
    $source = $_GET['source'];
} else {
    $source = '';
}
switch($source) {
    case 'add_user';
    echo "<h1 class='page-header'>ユーザー新規登録</h1>";
    include "includes/add_user.php";
    break;

    default:
    echo "<h1 class='page-header'>ユーザー一覧</h1>";
    include "includes/view_all_users.php";
    break;

    case 'edit_user';
    if(isset($_SESSION['user_id']) && $_GET['edit_user']==$_SESSION['user_id']) {
        echo "<h1 class='page-header'>Myアカウント編集</h1>";
    } else {
        echo "<h1 class='page-header'>ユーザー編集</h1>";
    }
    include "includes/edit_user.php";
    break;

}
?>

                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> テストテストてす
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>