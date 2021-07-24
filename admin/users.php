<?php include "a_includes/header.php" ?>
<?php ob_start(); ?>
<div id="wrapper">


    <?php

    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $uservisituserquery = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($uservisituserquery);
    $user_role = $row["user_role"];

    if ($user_role !== "Admin") {
        header("Location: index.php");
    }



    ?>




    <!-- Navigation -->
    <?php include "a_includes/nav_bar.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>author</small>
                    </h1>


                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }



                    switch ($source) {

                        case 'add_user':
                            include "a_includes/add_user.php";
                            break;

                        case 'edit_user':
                            include "a_includes/edit_user.php";
                            break;

                        case "343";
                            echo "nice";
                            break;

                        case "344";
                            echo "nice";
                            break;

                        default:
                            include "a_includes/view_all_user.php";
                            break;
                    }


                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <?php include "a_includes/footer.php" ?>