<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <?php


                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    //$queryに検索方法を代入
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_content LIKE '%$search%'";
                    //$queryの検索方法を使って実際にデータベース検索
                    $search_query = mysqli_query($connection, $query);
                    if(!$search_query) {
                        die("QUERY FAILD".mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>NO RESULT</h1>";
                    } else {

                        //search_queryの中の数だけ繰り返す
                        //$search_queryの行を、連想配列として取得し、$rowに代入
                        while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                        ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        <?php }
                    }
                }
                ?>


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

        <hr>

<?php include "includes/footer.php" ?>