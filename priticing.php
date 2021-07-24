<?php include "includes/db.php"; ?>


<?php

if (isset($_POST["submit"])) {
    $cat_title =  $_POST["cat_title"];
    if ($cat_title = "" || empty($cat_title)) {
        echo $cat_title;
        echo "Please fill up the input box";
    }
    // } else {
    //     $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
    //     $query_to_insert_data = mysqli_query($conn, $query);

    //     if (!$query_to_insert_data) {

    //         die("QUERY FILD") . mysqli_error($conn);
    //     }
    // }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="" method="post">

        <input type="text" name="cat_title"><br><br>
        <input type="submit" name="submit" value="submit">

    </form>


</body>

</html>