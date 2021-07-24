<form action="" method="post">

    <div class="form-group">
        <label for="cat-title">Updating Categories</label>
        <?php


        if (isset($_GET["edit"])) {

            $edit_cat_id = $_GET["edit"];
            $querys = "SELECT * FROM categories WHERE cat_id = $edit_cat_id ";
            $update_all_data_form_database_for_adminCat = mysqli_query($conn, $querys);
            while ($row = mysqli_fetch_assoc($update_all_data_form_database_for_adminCat)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];



        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" class="form-control" type="text" name="cat_title">
        <?php }
        } ?>



        <?php

        if (isset($_POST["update_categories"])) {
            $the_cat_title = $_POST["cat_title"];
            $query = "UPDATE categories SET cat_title = '{$the_cat_title}'  WHERE cat_id = '$cat_id' ";
            $query_for_update = mysqli_query($conn, $query);
            if (!$query_for_update) {
                die("QUERY FILD" . mysqli_error($conn));
            }
            header("Location:categories.php");
        }


        ?>




    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_categories" value="Update Category">
    </div>



</form>