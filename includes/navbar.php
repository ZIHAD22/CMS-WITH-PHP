<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS FRONT</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <a href="admin">Admin</a>
                </li>

                <?php


                if (isset($_SESSION['username'])) {

                    if (isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                        echo "<li><a href='./admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a></li>";
                    }
                }



                ?>
                <?php

                $pagename = basename($_SERVER['PHP_SELF']);

                if ($pagename == "registration.php") {

                    $registration_class = "active";
                } else if ($pagename == "contact.php") {
                    $contact_class = "active";
                }



                ?>


                <li class="<?php echo $registration_class; ?>">
                    <a href="registration.php">Registration</a>
                </li>
                <li class="<?php echo $contact_class; ?>">
                    <a href="contact.php">Contact</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse-->
    </div>
    <!-- /.container -->
</nav>