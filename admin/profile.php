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
                    <?php


                    if (isset($_SESSION["username"])) {

                        $the_user_name = $_SESSION["username"];
                        $query = "SELECT * FROM users WHERE username = '{$the_user_name}' ";
                        $profile_query = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($profile_query)) {
                            $user_firstname = $row["user_firstname"];
                            $user_lastname = $row["user_lastname"];
                            $user_role = $row["user_role"];
                            $username = $row["username"];
                            $user_email = $row["user_email"];
                            $user_password = $row["user_password"];
                        }
                    }

                    if (isset($_POST['update_profile'])) {
                        $user_firstname = $_POST["user_firstname"];
                        $user_lastname = $_POST["user_lastname"];
                        $user_role = $_POST["user_role"];
                        $username = $_POST["username"];
                        // $post_image = $_FILES['image']['name'];
                        // $post_image_tamp = $_FILES['image']['tmp_name'];


                        $user_email = $_POST["user_email"];
                        // $user_id = $_POST["user_id"];
                        $user_password = $_POST["user_password"];
                        // $post_date = date('d - m - y');
                        // $post_comment_count = 4;

                        // move_uploaded_file($post_image_tamp, "../images/$post_image");
                        $query_for_rs = "SELECT randSalt FROM users ";
                        $query_for_randsalt = mysqli_query($conn, $query_for_rs);

                        $row = mysqli_fetch_array($query_for_randsalt);
                        $salt = $row['randSalt'];
                        $hash_password = crypt($user_password, $salt);
                        $query = "UPDATE users SET user_firstname = '$user_firstname' , user_lastname = '$user_lastname' , user_role = '$user_role' , username= '$username' , user_email = '$user_email' , user_password = '$hash_password' WHERE username = '{$the_user_name}' ";

                        $update_profile = mysqli_query($conn, $query);
                        confirmQuery($update_profile);
                    }


                    ?>
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="user_firstname">First Name</label>
                            <input value="<?php echo $user_firstname; ?>" type="text" class="form-control"
                                   name="user_firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname">Last Name</label>
                            <input value="<?php echo $user_lastname; ?>" type="text" class="form-control"
                                   name="user_lastname">
                        </div>
                        <div class="form-group">
                            <label for="user_role">User Role:</label>

                            <select style="outline:none;" name="user_role" id="">

                                <option value='admin'><?php echo $user_role; ?></option>
                                ";


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
                            <input value="<?php echo $user_email; ?>" type="email" class="form-control"
                                   name="user_email">
                        </div>
                        <div class="input-group">
                            <label for="user_password">Password</label>
                            <input value="<?php echo $user_password; ?>" type="password" id="allpass" class="form-control allpass" name="user_password">
                            <span class="input-group-btn">
                                <input  type="checkbox" id="password">
                            </span>
                        </div>


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                        </div>


                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    </div><?php include "a_includes/footer.php" ?>