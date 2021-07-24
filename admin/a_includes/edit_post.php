<?php

if (isset($_GET['p_id'])) {

    $select_post_id = $_GET['p_id'];
}

$querys = "SELECT * FROM posts WHERE post_id = {$select_post_id}";


$select_all_post = mysqli_query($conn, $querys);
while ($row = mysqli_fetch_assoc($select_all_post)) {
    $post_id = $row["post_id"];
    $post_author = $row["post_author"];
    $post_title = $row["post_title"];
    $post_category_id = $row["post_category_id"];
    $post_status = $row["post_status"];
    $post_image = $row["post_image"];
    $post_tags = $row["post_tags"];
    $post_comment_count = $row["post_comment_count"];
    $post_date = $row["post_date"];
    $post_content = $row["post_content"];
}


if (isset($_POST["update_post"])) {

    $post_title = $_POST["post_title"];
    $post_author = $_POST["author"];
    $post_category_id = $_POST["category_id"];
    $post_status = $_POST["post_status"];
    $post_image = $_FILES['image']['name'];
    $post_image_tamp = $_FILES['image']['tmp_name'];


    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];
    $post_date = date('d - m - y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_tamp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $select_post_id";
        $image_conndb = mysqli_query($conn, $query);
        while ($raw = mysqli_fetch_assoc($image_conndb)) {
            $post_image = $raw["post_image"];
        }
    }

    $query = "UPDATE posts SET post_title = '$post_title' , post_author = '$post_author' , post_category_id = '$post_category_id' , post_status= '$post_status' , post_image = '$post_image' , post_tags = '$post_tags' , post_content = '$post_content' , post_date = now() , post_comment_count = '$post_comment_count'  WHERE post_id = {$select_post_id} ";
    $query_for_update = mysqli_query($conn, $query);
    confirmQuery($query_for_update);
    echo "<p>Post Updated: <a href='../post.php?p_id={$select_post_id}'>View Updated Post</a></p>";
}
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="category">Post Category Id:</label>
        <select style="outline:none;" name="category_id" id="">




            <?php


            $edit_cat_id = $_GET["edit"];
            $querys = "SELECT * FROM categories";
            $update_all_data_form_database_for_edit_post = mysqli_query($conn, $querys);
            confirmQuery($update_all_data_form_database_for_edit_post);
            while ($row = mysqli_fetch_assoc($update_all_data_form_database_for_edit_post)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];


                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }



            ?>







        </select>
    </div>


    <div class="form-group">
        <label for="users">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status:</label>
        <select style="outline: none;" name="post_status" id="">

            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>

            <?php

            if ($post_status == "Published") {
                echo "<option value='Draft'>Draft</option>";
            } else {
                echo "<option value='Published'>Publish</option>";
            }

            ?>

        </select>
    </div>



    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100 " height="40px" src="../images/<?php echo $post_image ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="body" cols="30" rows="10"> <?php echo $post_content; ?>
        </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Edit Post">
    </div>


</form>