<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navbar.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];

                $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $the_post_id ";
                $send_view_query = mysqli_query($conn , $view_query);


            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $poll_all_data_form_postdatabase = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($poll_all_data_form_postdatabase)) {
                // $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];

            ?>




                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>


                <hr>

            <?php           }    } else{
                header("Location:index.php");
            }     ?>

            <!-- Comments Form -->



            <?php

            if (isset($_POST["create_comment"])) {
                $the_post_id = $_GET['p_id'];
                $comment_author = $_POST["comment_author"];
                $comment_email = $_POST["comment_email"];
                $comment_content = $_POST["comment_content"];

                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                    $query = "INSERT INTO comments (comment_post_id , comment_author , comment_email , comment_content , comment_status , comment_date)  VALUES ($the_post_id , '{$comment_author}' , '{$comment_email}' , '{$comment_content}' , 'Unapprove' , now() )";
                    $post_comment_into_admin = mysqli_query($conn, $query);
                    // confirmQuery($post_comment_into_admin);


//                    $querys = "UPDATE posts SET post_comment_count = post_comment_count  + 1 WHERE post_id = {$the_post_id}";
//                    $post_comment_count_query = mysqli_query($conn, $querys);
                } else {
                    echo "<script>alert('Please Fild All of Comment Options')</script>";
                }
            }


            ?>







            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="comment_author">Name</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="email" class="form-control" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>







            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id = '$the_post_id' AND comment_status = 'Approved' ORDER BY comment_id DESC  ";
            $show_all_data_show = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($show_all_data_show)) {
                $comment_show_author = $row['comment_author'];
                $comment_show_date = $row['comment_date'];
                $comment_show_content = $row['comment_content'];


            ?>
                <hr>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_show_author; ?>
                            <small><?php echo $comment_show_date; ?></small>
                        </h4>
                        <?php echo $comment_show_content; ?>
                    </div>
                </div>


            <?php } ?>




        </div>



















        <!-- Blog Sidebar Widgets Column -->
        <?php include  "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include  "includes/footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>