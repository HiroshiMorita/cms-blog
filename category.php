<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];
                }

                $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ORDER BY post_id DESC";
                $select_all_posts_query = mysqli_query($connection, $query);
                //postsの中の数だけ繰り返す
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,300)."...";
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
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <?php include "includes/sidebar.php" ?>

        </div>

<?php include "includes/footer.php" ?>