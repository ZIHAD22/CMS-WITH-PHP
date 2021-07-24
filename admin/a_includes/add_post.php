<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST["title"];
    $post_author = $_POST["author"];
    $post_category_id = $_POST["category_id"];
    $post_status = $_POST["post_status"];
    $post_image = $_FILES['image']['name'];
    $post_image_tamp = $_FILES['image']['tmp_name'];


    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];
    $post_date = date('d - m - y');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_tamp, "../images/$post_image");

    $query = "INSERT INTO posts (post_category_id , 	post_title , 	post_author , post_date , 	post_image , post_content , 	post_tags , post_status ) VALUES ({$post_category_id} , '{$post_title}' , '{$post_author}' ,now(),'{$post_image}' ,'{$post_content}', '{$post_tags}'  ,'{$post_status}')";

    $add_post_query = mysqli_query($conn, $query);
    confirmQuery($add_post_query);
}





?>




<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="users">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="category">Post Category Id:</label>
        <select style="outline:none;" name="category_id" id="">




            <?php



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


        <label for="post_status">Post Status:</label>
        <select name="post_status" id="">
            <option value="">Select Option</option>
            <option value="Published">Publish</option>
            <option value="Draft">Draft</option>
        </select>

    </div>



    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="body" cols="30" rows="10">







        </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>