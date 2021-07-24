<?php
if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $edit_user_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($edit_user_query)) {
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_role = $row["user_role"];
        $username = $row["username"];
        $user_email = $row["user_email"];
        $db_user_password = $row["user_password"];
        global $db_user_password;
    }


}

if (isset($_POST['update_user'])) {
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];


    $hash_password = password_hash("$db_user_password" , PASSWORD_BCRYPT , array("cost"=>10));

    $query = "UPDATE users SET user_firstname = '{$user_firstname}' , user_lastname = '{$user_lastname}' , user_role = '{$user_role}' , username= '{$username}' , user_email = '{$user_email}' , user_password = '{$hash_password}'WHERE user_id = $the_user_id ";

    $add_edit_user_query = mysqli_query($conn, $query);
    confirmQuery($add_edit_user_query);
}
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_role">User Role:</label>

        <select style="outline:none;" name="user_role" id="">

            <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>";


            <?php

            if ($user_role == "admin") {
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo " <option value='admin'>Admin</option>";
            }

            ?>






        </select>
    </div>



    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="username">User Name</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="" type="text" class="form-control" name="user_password">
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>


</form>