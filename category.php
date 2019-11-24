<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <?php
                //1ページあたりの表示記事数
                $per_page = 5;
                //ページネーションのページ判定
                if(isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];
                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                }
                //ページネーション配列スタート位置定義
                $page_1 = ($page * $per_page) - $per_page;

                $post_query_count = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
                $find_count = mysqli_query($connection,$post_query_count);
                $count = mysqli_num_rows($find_count);
                //1ページに表示する数で割ったとき小数点以下切り上げてページ数としている
                $count = ceil($count / $per_page);

                $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ORDER BY post_id DESC LIMIT $page_1, $per_page";
                $select_all_posts_query = mysqli_query($connection, $query);
                //postsの中の数だけ繰り返す
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,49)."...";
                ?>

                <!-- 表示部分 -->
                <h3>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h3>
                    <i class="fa fa-user"></i> <a href="index.php"><?php echo $post_author ?>&emsp;</a>
                <span class="glyphicon glyphicon-time"></span><?php echo $post_date ?><br><br>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                <?php } ?>

                <!-- ページネーション -->
                <ul class="pager">
                    <?php
                        for($i = 1; $i <= $count; $i++) {
                            if($i == $page) {
                                echo "<li><a href='category.php?category={$post_category_id}&page={$i}' class='active_link'>{$i}</a></li>";
                            } else {
                            echo "<li><a href='category.php?category={$post_category_id}&page={$i}'>{$i}</a></li>";
                        }
                        }
                    ?>
                    <li class="previous">
                        <?php
                        if ($page <= 1) {
                        } else {
                            $previous_page = $page - 1;
                            echo "<a href='category.php?category={$post_category_id}&page={$previous_page}'>&larr; 前のページ</a>";
                        }
                        ?>
                    </li>
                    <li class="next">
                        <?php
                        if ($page >= $count) {
                        } else {
                            $next_page = $page + 1;
                            echo "<a href='category.php?category={$post_category_id}&page={$next_page}'>次のページ &rarr;</a>";
                        }
                        ?>
                    </li>
                </ul>

            </div>

            <?php include "includes/sidebar.php" ?>

        </div>

<?php include "includes/footer.php" ?>