<?php include "a_includes/header.php" ?>
<?php ob_start(); ?>
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
                        <small>author</small>
                    </h1>


                    <div class="col-xs-6">
                        <!-- add categories function  -->
                        <?php add_categorie(); ?>

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="cat-title">Add Categories</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>



                        </form>

                        <?php

                        if (isset($_GET["edit"])) {

                            $cat_title = $_GET["edit"];

                            include "a_includes/update_categoty.php";
                        }


                        ?>

                    </div>





                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- here is php  -->
                                <?php findALlCategories(); ?>
                                <?php delete_Categories(); ?>

                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <?php include "a_includes/footer.php" ?>