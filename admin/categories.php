<?php include "includes/admin_header.php" ?>

    <div id="wrapper">
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            カテゴリー
                        </h1>
                        <div class="col-xs-6">
<?php insert_categories() ?>
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title"> カテゴリーを追加</label>
                              <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="追加">
                            </div>
                          </form>

<?php
if(isset($_GET['edit'])) {
$cat_id = $_GET['edit'];
include "includes/update_categories.php";
}
?>

                        </div>
                        <div class="col-xs-6">

                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>カテゴリー名</th>
                                <th>削除</th>
                                <th>編集</th>
                              </tr>
                            </thead>
                            <tbody>
<?php findAllCategories() ?>

<?php deleteCategories() ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/admin_footer.php" ?>