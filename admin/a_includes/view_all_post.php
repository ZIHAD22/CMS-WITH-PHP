<?php
include("a_includes/delete_modal.php");
if (isset($_POST['checkBoxArray'])) {
    $checkBoxArrey = $_POST['checkBoxArray'];

    foreach ($checkBoxArrey as $checkBoxValue) {

        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case "Published":
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $publish_query = mysqli_query($conn, $query);
                break;
            case "Draft":
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $checkBoxValue";
                $draft_query = mysqli_query($conn, $query);
                break;
            case "Delete":
                $query = "DELETE FROM posts WHERE post_id = $checkBoxValue";
                $delete_query = mysqli_query($conn, $query);
                break;
            case "clone":
                $query = "SELECT * FROM posts WHERE post_id = $checkBoxValue ";
                $clone_query = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($clone_query)) {
                    $post_author = $row["post_author"];
                    $post_title = $row["post_title"];
                    $post_category_id = $row["post_category_id"];
                    $post_status = $row["post_status"];
                    $post_image = $row["post_image"];
                    $post_tags = $row["post_tags"];
                    $post_content = $row["post_content"];
                    $post_date = $row["post_date"];
                }

                $query = "INSERT INTO posts (post_category_id , post_title , post_author , post_status , post_image , post_tags , post_date , post_content) VALUES ($post_category_id , '{$post_title}' , '{$post_author}' , '{$post_status}' , '{$post_image}' , '{$post_tags}' , '{$post_date}' , '{$post_content}') ";

                $clone_query_conn = mysqli_query($conn, $query);
        }
    }
}



?>


<form action="" method="POST">
    <table class="table table-bordered table-hover">

        <div id="bulkOptionContainer" class="col-xs-2">

            <select class="bulkOpt" name="bulk_options" id="">

                <option value="">Select Option</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
                <option value="clone">Clone</option>


            </select>

        </div>

        <div class="col-xs-4">

            <input type="submit" value="apply" class="btn btn-success" name="submit">
            <a href="posts.php?source=add_post" class="btn btn-primary"> Add New</a>

        </div>

        <thead>
            <tr>
                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Images</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>




            <?php


            $querys = "SELECT * FROM posts ORDER BY post_id DESC";


            $select_all_post = mysqli_query($conn, $querys);
            while ($row = mysqli_fetch_assoc($select_all_post)) {
                $post_id = $row["post_id"];
                $post_author = $row["post_author"];
                $post_title = $row["post_title"];
                $post_category_id = $row["post_category_id"];
                $post_status = $row["post_status"];
                $post_image = $row["post_image"];
                $post_tags = $row["post_tags"];
                $post_comment_count = $row["post_comment_count"];
                $post_date = $row["post_date"];
                $post_view_count = $row["post_view_count"];

                echo  "<tr>";
                echo "<th><input type='checkbox' name='checkBoxArray[]' class='checkboxs' value='{$post_id}'></th>";
                echo "<th>{$post_id}</th>";
                echo "<th>{$post_author}</th>";
                echo "<th><a href = '../post.php?p_id={$post_id}'>{$post_title}</a></th>";


                $querys = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                $update_all_data_form_database_for_adminCat = mysqli_query($conn, $querys);
                while ($row = mysqli_fetch_assoc($update_all_data_form_database_for_adminCat)) {
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];
                }

                echo "<th>{$cat_title}</th>";





                echo "<th>{$post_status}</th>";
                echo "<th><img width='100' height='40' src='../images/{$post_image}'></th>";
                echo "<th>{$post_tags}</th>";

                $query_for_comment = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                $query_for_comment_send = mysqli_query($conn, $query_for_comment);
                $query_for_comment_count = mysqli_num_rows($query_for_comment_send);

                echo "<th><a href = '../post.php?p_id={$post_id}'>{$query_for_comment_count}</a></th>";



                echo "<th>{$post_date}</th>";
                echo "<th><a href='posts.php?reset={$post_id}'>$post_view_count</a></th>";
                echo "<th><a href = 'posts.php?source=edit_post&p_id={$post_id}'>Edit</a></th>";
                echo "<th><a href = 'javascript:void(0)' rel='{$post_id}' class='delete_link'>Deletet</a></th>";
                // echo "<th><a onclick=\" javascript: return confirm('Are you sure! You Want To Delete it?')\" href = 'posts.php?delete={$post_id}'>Delete</a></th>";
                echo "</tr>";
            }



            ?>

        </tbody>
    </table>
</form>


<?php

if (isset($_GET["delete"])) {
    $delete_the_post_id = $_GET["delete"];
    $query = "DELETE FROM posts WHERE post_id = {$delete_the_post_id}";
    $admin_post_delet = mysqli_query($conn, $query);

    confirmQuery($admin_post_delet);
    header("location:posts.php");
}




if (isset($_GET["reset"])) {
    $reset_the_post_id = $_GET["reset"];
    $query = "UPDATE posts SET post_view_count = 0 WHERE post_id = $reset_the_post_id ";
    $admin_post_reset = mysqli_query($conn, $query);

    confirmQuery($admin_post_reset);
    header("location:posts.php");
}


?>;

<script>
    $(document).ready(function() {


        $(".delete_link").on("click", function() {
            let id = $(this).attr("rel");
            let delete_url = "posts.php?delete=" + id;
            $(".delete_modal_link").attr("href", delete_url);
            $(".modal").modal("show");
        })

    });
</script>