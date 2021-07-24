<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navbar.php" ?>

<!-- Page Content -->
.<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php
            $par_page = 2;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "1";
            }
            if ($page == "" || $page == 0) {

                $page_one = 1;
                global $page_one;
            } else {
                $page_one = ($page * $par_page) - $par_page;
            }


            #this code is for collect all post in database pangration
            $post_count = "SELECT * FROM posts WHERE post_status = 'Published' ";
            $post_count_conn = mysqli_query($conn, $post_count);
            $count = mysqli_num_rows($post_count_conn);
            $count = ceil($count / $par_page);


            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_one,$par_page  ";
            $poll_all_data_form_postdatabase = mysqli_query($conn, $query);
            if (!$poll_all_data_form_postdatabase) {
                die("query faild" . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($poll_all_data_form_postdatabase)) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = substr($row["post_content"], 0, 200);
                $post_status = $row["post_status"];
                if ($post_status !== 'Published') {
                    echo "<h1 class = 'text-center'>NO POST SORRY</h1>";
                } else {

            ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

            <?php           }
            }    ?>

        </div>



















        <!-- Blog Sidebar Widgets Column -->
        <?php include  "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>
    <ul class="pager">


        <?php


        for ($i = 1; $i <= $count; $i++) {
            if ($i == $page) {
                echo "<li><a class='acctive_link' href='index.php?page=$i'>$i</a></li>";
            } else {
                echo "<li><a href='index.php?page=$i'>$i</a></li>";
            }
        }

        ?>



    </ul>
    <!-- Footer -->
    <?php include  "includes/footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>

</html>