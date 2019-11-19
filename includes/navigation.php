<!-- ナビゲーションバー -->
<nav class="navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- 縮小時ハンバーガーメニュー -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-pencil"></i> brain-note </a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $query = "SELECT * FROM categories";
                    //$connectionはincludes/db.php内のもの
                    $select_all_categories_query = mysqli_query($connection, $query);
                    //カテゴリーの中の数だけ繰り返す
                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href=''>{$cat_title}</a></li>";
                    }
                    ?>

                    <li>
                        <a href="admin">Admin</a>
                    </li>

                    <li>
                        <a href="registration.php">Registration</a>
                    </li>
                    <?php
                    // if (session_status() === PHP_SESSION_NONE) session_start();
                    if(isset($_SESSION['user_role'])) {
                        if(isset($_GET['p_id'])) {
                            $the_post_id = $_GET['p_id'];
                            echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                        }
                    }
                    ?>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>