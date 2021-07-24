<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>




        <?php


        $querys = "SELECT * FROM comments ORDER BY comment_id DESC";
        $select_all_comments = mysqli_query($conn, $querys);
        while ($row = mysqli_fetch_assoc($select_all_comments)) {
            $comment_id = $row["comment_id"];
            $comment_author = $row["comment_author"];
            $comment_post_id = $row["comment_post_id"];
            $comment_email = $row["comment_email"];
            $comment_content = $row["comment_content"];
            $comment_status = $row["comment_status"];
            $comment_date = $row["comment_date"];


            echo  "<tr>";
            echo "<th>{$comment_id}</th>";
            echo "<th>{$comment_author}</th>";
            echo "<th>{$comment_content}</th>";


            // $querys = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
            // $update_all_data_form_database_for_adminCat = mysqli_query($conn, $querys);
            // while ($row = mysqli_fetch_assoc($update_all_data_form_database_for_adminCat)) {
            //     $cat_id = $row["cat_id"];
            //     $cat_title = $row["cat_title"];
            //     echo "<th>{$cat_title}</th>";
            // }






            echo "<th>{$comment_email}</th>";
            echo "<th>{$comment_status}</th>";

            $query = "SELECT * FROM posts WHERE post_id  = {$comment_post_id}";
            $connection_for_title = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($connection_for_title)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<th><a href = '../post.php?p_id=$post_id '>$post_title</a></th>";
            }







            echo "<th>{$comment_date}</th>";
            echo "<th><a href = 'comments.php?approve=$comment_id'>Approve</a></th>";
            echo "<th><a href = 'comments.php?unapprove=$comment_id'>Unapprove</a></th>";
            echo "<th><a href = 'comments.php?delete=$comment_id'>Delete</a></th>";
            echo "</tr>";
        }



        ?>

    </tbody>
</table>



<?php
if (isset($_GET["unapprove"])) {
    $approve_the_comment_id = $_GET["unapprove"];
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$approve_the_comment_id} ";
    $admin_post_delet = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:comments.php");
}

if (isset($_GET["approve"])) {
    $approve_the_comment_id = $_GET["approve"];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$approve_the_comment_id} ";
    $admin_post_delet = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:comments.php");
}

if (isset($_GET["delete"])) {
    $delete_the_comment_id = $_GET["delete"];
    $query = "DELETE FROM comments WHERE comment_id = {$delete_the_comment_id}";
    $admin_post_delet = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:comments.php");
}


?>