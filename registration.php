<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>


<!-- Navigation -->

<?php include "includes/navbar.php" ?>


<!-- Page Content -->

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];


    if (!empty($username) && !empty($email) && !empty($password)) {
        $username = mysqli_real_escape_string($conn, $username);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $user_firstname = mysqli_real_escape_string($conn, $user_firstname);
        $user_lastname = mysqli_real_escape_string($conn, $user_lastname);
        
        $password = md5($password);

        $query = "INSERT INTO users (username ,user_firstname , user_lastname , user_email , user_password , user_role) VALUES ('{$username}' , '{$user_firstname}' , '{$user_lastname}' , '{$email}' , '$password' , 'Suscriber')";
        $registration_Query = mysqli_query($conn, $query);
        if (!$registration_Query) {
            die("Query Fild" . " " . mysqli_error($conn));
        }

        header("Location:index.php");
    } else {
        echo "<script>alert('Plese fill up the rigistration from')</script>";
    }
}



?>


<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="user_firstname" class="sr-only">User First Name</label>
                                <input type="text" name="user_firstname" id="key" class="form-control" placeholder="Enter Frist Name">
                            </div>
                            <div class="form-group">
                                <label for="user_lastname" class="sr-only">User Last Name</label>
                                <input type="text" name="user_lastname" id="key" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>
</div>