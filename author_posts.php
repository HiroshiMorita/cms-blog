<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

    <div class="container">

        <div class="row">

aaaaaaaaa
            <div class="col-md-8">
                <?php

                if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
                    $the_post_author = $_GET['author'];
                }

                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ORDER BY post_id DESC";
                $select_all_posts_query = mysqli_query($connection, $query);
                //postsの中の数だけ繰り返す
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>

                <!-- 表示部分 -->
                <h3>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h3>
                    <i class="fa fa-user"></i> <a href="#"><?php echo $post_author ?></a>&emsp;
                <span class="glyphicon glyphicon-time"></span><?php echo $post_date ?><br><br>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <p><?php echo $post_content ?></p>
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