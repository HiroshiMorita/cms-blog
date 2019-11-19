<div class="col-md-4">

<!-- 記事検索 -->
<div class="">
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" placeholder="記事検索" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
</div>
<br>

<!-- ログイン -->
<div class="well">
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



<!-- カテゴリー -->
<div class="well">

    <?php
        $query = "SELECT * FROM categories";
        //$connectionはincludes/db.php内のもの
        $select_categories_sidebar = mysqli_query($connection, $query);
        //カテゴリーの中の数だけ繰り返す
    ?>

    <h4>CATEGORY</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
            </ul>
        </div>

    </div>
</div>

<?php include "widget.php" ?>

</div>