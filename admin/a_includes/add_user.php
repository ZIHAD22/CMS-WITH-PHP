<?php
if (isset($_POST['create_user'])) {
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $username = $_POST["username"];
    // $post_image = $_FILES['image']['name'];
    // $post_image_tamp = $_FILES['image']['tmp_name'];


    $user_email = $_POST["user_email"];
    // $user_id = $_POST["user_id"];
    $user_password = $_POST["user_password"];

    $user_password = password_hash('$password' , PASSWORD_BCRYPT , array('cost' => 10));

    // $post_date = date('d - m - y');
    // $post_comment_count = 4;

    // move_uploaded_file($post_image_tamp, "../images/$post_image");


    $query = "INSERT INTO users (user_firstname , 	user_lastname , user_role , username , user_email , 	user_password  ) VALUES ( '{$user_firstname}' , '{$user_lastname}' ,'{$user_role}' ,'{$username}', '{$user_email}'  ,'{$user_password}')";

    $add_user_query = mysqli_query($conn, $query);
    confirmQuery($add_user_query);
    echo "User Created :" . " " . "<a href='./users.php'>View User</a>";
}





?>




<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_role">User Role:</label>
        <select style="outline:none;" name="user_role" id="">
            <option value="subscriber">Select Role</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>

        </select>
    </div>



    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>


</form>