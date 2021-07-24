<?php

if (isset($_POST['checkBoxArray'])) {
    $checkBoxArrey = $_POST['checkBoxArray'];

    foreach ($checkBoxArrey as $checkBoxValue) {

        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case "Suscriber":
                $query = "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = $checkBoxValue";
                $publish_query = mysqli_query($conn, $query);
                break;
            case "Admin":
                $query = "UPDATE users SET user_role = '{$bulk_options}' WHERE user_id = $checkBoxValue";
                $draft_query = mysqli_query($conn, $query);
                break;
            case "Delete":
                $query = "DELETE FROM users WHERE user_id = $checkBoxValue";
                $delete_query = mysqli_query($conn, $query);
                break;

        }
    }
}



?>





    <form action="" method="post">
<table class="table table-bordered table-hover">

        <div id="bulkOptionContainer" class="col-xs-2">

             <select class="bulkOpt" name="bulk_options" id="">

                <option value="Suscriber">Select Option</option>
                <option value="Suscriber">Suscriber</option>
                <option value="Admin">Admin</option>
                <option value="Delete">Delete</option>

            </select>

        </div>

    <div class="col-xs-4">

        <input type="submit" value="apply" class="btn btn-success" name="submit">

    </div>
    <thead>
        <tr>
            <th><input type="checkbox" name="" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <!-- <th>Date</th> -->
        </tr>
    </thead>
    <tbody>




        <?php


        $querys = "SELECT * FROM users ORDER BY user_id DESC";


        $select_all_user = mysqli_query($conn, $querys);
        while ($row = mysqli_fetch_assoc($select_all_user)) {
            $user_id = $row["user_id"];
            $username = $row["username"];
            $user_password = $row["user_password"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_email = $row["user_email"];
            $user_image = $row["user_image"];
            $user_role = $row["user_role"];


            echo  "<tr>";
            echo "<th><input type='checkbox' name='checkBoxArray[]' class='checkboxs' value='{$user_id}'></th>";
            echo "<th>{$user_id}</th>";
            echo "<th>{$username}</th>";
            echo "<th>{$user_firstname}</th>";


            // $querys = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
            // $update_all_data_form_database_for_adminCat = mysqli_query($conn, $querys);
            // while ($row = mysqli_fetch_assoc($update_all_data_form_database_for_adminCat)) {
            //     $cat_id = $row["cat_id"];
            //     $cat_title = $row["cat_title"];
            //     echo "<th>{$cat_title}</th>";
            // }






            echo "<th>{$user_lastname}</th>";
            echo "<th>{$user_email}</th>";
            echo "<th>{$user_role}</th>";

            // $query = "SELECT * FROM posts WHERE post_id  = {$comment_post_id}";
            // $connection_for_title = mysqli_query($conn, $query);
            // while ($row = mysqli_fetch_assoc($connection_for_title)) {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];
            //     echo "<th><a href = '../post.php?p_id=$post_id '>$post_title</a></th>";
            // }








            echo "<th><a href = 'users.php?change_to_admin={$user_id}'>Admin</a></th>";
            echo "<th><a href = 'users.php?change_to_sub={$user_id}'>Subscribe</a></th>";
            echo "<th><a href = 'users.php?source=edit_user&edit_user={$user_id}'>Edit</a></th>";
            echo "<th><a onclick=\" javascript: return confirm('Do You Want to Delete it Parmanently')\" href = 'users.php?delete={$user_id}'>Delete</a></th>";
            echo "</tr>";
        }



        ?>

    </tbody>
</table>
</form>



<?php
if (isset($_GET["change_to_admin"])) {
    $change_to_admin = $_GET["change_to_admin"];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$change_to_admin} ";
    $change_to_admin_query = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:users.php");
}

if (isset($_GET["change_to_sub"])) {
    $change_to_sub = $_GET["change_to_sub"];
    $query = "UPDATE users SET user_role = 'Subscribe' WHERE user_id = {$change_to_sub} ";
    $change_to_sub_query = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:users.php");
}

if (isset($_GET["delete"])) {
    $delete_the_user_id = $_GET["delete"];
    $query = "DELETE FROM users WHERE user_id = {$delete_the_user_id}";
    $admin_user_delet = mysqli_query($conn, $query);

    // confirmQuery($admin_post_delet);
    header("location:users.php");
}


?>