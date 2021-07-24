<div class="col-md-4">
    <?php ob_start() ?>
    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Search Well -->

    <div class="well">
        <?php if (isset($_SESSION['user_role'])) : ?>
            <h4>You Login as <?php echo $_SESSION['username']; ?></h4>
            <a class="btn btn-primary" href="admin/a_includes/logout.php">Log Out</a>

        <?php else : ?>
            <h4>Log in</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                        <button class="btn btn-primary " name="login" type="submit">Submit</button>
                    </span>
                </div>
            </form>
        <?php endif; ?>




        <!-- /.input-group -->
    </div>


    <!-- Blog Categories Well -->

    <?php

    $querys = "SELECT * FROM categories";
    $poll_all_data_form_database_for_sideCat = mysqli_query($conn, $querys);
    ?>
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($poll_all_data_form_database_for_sideCat)) {
                        $cat_title = $row["cat_title"];
                        $cat_id = $row["cat_id"];
                        echo "<li> <a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>