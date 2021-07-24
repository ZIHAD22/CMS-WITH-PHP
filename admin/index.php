<?php include "a_includes/header.php" ?>





<div id="wrapper">
    <!-- Navigation -->
    <?php include "a_includes/nav_bar.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php

                                        $query = "SELECT * FROM posts ";
                                        $query_connection = mysqli_query($conn, $query);
                                        echo $posts_count = mysqli_num_rows($query_connection);


                                        ?>
                                    </div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php

                                        $query = "SELECT * FROM comments ";
                                        $query_connection = mysqli_query($conn, $query);
                                        echo $comment_count = mysqli_num_rows($query_connection);


                                        ?>
                                    </div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php

                                        $query = "SELECT * FROM users ";
                                        $query_connection = mysqli_query($conn, $query);
                                        echo $users_count = mysqli_num_rows($query_connection);


                                        ?>
                                    </div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>

                                        <?php

                                        $query = "SELECT * FROM categories ";
                                        $query_connection = mysqli_query($conn, $query);
                                        echo $categories_count = mysqli_num_rows($query_connection);


                                        ?>


                                    </div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">


                <?php

                $query = "SELECT * FROM posts  ";
                $query_for_all_post = mysqli_query($conn, $query);
                $all_posts_count = mysqli_num_rows($query_for_all_post);

                $query = "SELECT * FROM posts WHERE post_status = 'draft'  ";
                $query_for_draft_post = mysqli_query($conn, $query);
                $draft_post_count = mysqli_num_rows($query_for_draft_post);

                $query = "SELECT * FROM posts WHERE post_status = 'Published' ";
                $query_for_published_post = mysqli_query($conn, $query);
                $published_posts_count = mysqli_num_rows($query_for_published_post);

                $query = "SELECT * FROM users WHERE user_role = 'Subscribe' ";
                $query_for_user_role = mysqli_query($conn, $query);
                $user_role_count = mysqli_num_rows($query_for_user_role);

                $query = "SELECT * FROM comments WHERE comment_status = 'Unapprove' ";
                $query_for_comment_status = mysqli_query($conn, $query);
                $comment_status_count = mysqli_num_rows($query_for_comment_status);



                ?>




                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],


                            <?php

                            $element_text = ["All Posts", "Published Post", "Draft", "Categories", "Users", "User Role", "Comments", "Unapprove Comments"];
                            $element_count = ["{$all_posts_count}", "{$published_posts_count}", "{$draft_post_count}", "{$categories_count}", "{$users_count}", "{$user_role_count}", "{$comment_count}", "{$comment_status_count}"];

                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "'{$element_count[$i]}'],";
                            }




                            ?>




                            // ['posts', 1000],

                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: auto; height: 330px"></div>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php include "a_includes/footer.php" ?>