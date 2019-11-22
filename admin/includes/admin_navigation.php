<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- 縮小時ハンバーガーメニュー -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">管理画面</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">ブログ画面へ</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php
                        if(isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i>アカウント編集</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>ログアウト</a>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> ダッシュボード</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-file"></i></i> 投稿<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="posts.php">一覧</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">新規作成</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-folder"></i> カテゴリー</a>
                    </li>
                    <li class="">
                        <a href="comments.php"><i class="fa fa-comment"></i> コメント</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user"></i> ユーザー<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">一覧</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">追加</a>
                            </li>
                        </ul>
                    </li>
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-wrench"></i> Myアカウント編集</a>
                </li>
                </ul>
            </div>


            <!-- /.navbar-collapse -->
        </nav>