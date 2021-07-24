<?php

function confirmQuery($result)
{
    global $conn;
    if (!$result) {
        die("QUERY FILD" . mysqli_error($conn));
    }
}


function add_categorie()
{

    global $conn;
    if (isset($_POST["submit"])) {
        $cat_title =  $_POST["cat_title"];
        if ($cat_title == "" || empty($cat_title)) {

            echo "Please fill up the input box";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
            $query_to_insert_data = mysqli_query($conn, $query);

            if (!$query_to_insert_data) {

                die("QUERY FILD") . mysqli_error($conn);
            }
        }
    }
}

function findALlCategories()
{
    global $conn;

    $querys = "SELECT * FROM categories";
    $poll_all_data_form_database_for_adminCat = mysqli_query($conn, $querys);
    while ($row = mysqli_fetch_assoc($poll_all_data_form_database_for_adminCat)) {
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
        echo  "<tr>";
        echo "<th>{$cat_id}</th>";
        echo "<th>{$cat_title}</th>";
        echo "<th><a href = ' categories.php?delete={$cat_id} '>Delete</a></th>";
        echo "<th><a href = ' categories.php?edit={$cat_id} '>Edit</a></th>";
        echo "</tr>";
    }
}

function delete_Categories()
{
    global $conn;
    if (isset($_GET["delete"])) {
        $the_cat_id = $_GET["delete"];
        $query = "DELETE FROM categories WHERE cat_id = '$the_cat_id' ";
        $Query_for_delete = mysqli_query($conn, $query);
        header("Location:categories.php");
    }
}


function users_online(){
    if (isset($_GET['onlineusers'])) {
        global $conn;

        if (!$conn){
            session_start();
            include "../includes/db.php";

            $session = session_id();
            $time = time();
            $time_out_in_secounds = 30;
            $time_out = $time - $time_out_in_secounds;

            $query = "SELECT * FROM users_online WHERE session = '$session' ";
            $send_query = mysqli_query($conn, $query);
            $count = mysqli_num_rows($send_query);

            if ($count == NULL) {
                mysqli_query($conn, "INSERT INTO users_online (session , time) VALUES ('$session','$time') ");
            } else {
                mysqli_query($conn, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
            }

            $the_query = mysqli_query($conn, "SELECT * FROM users_online WHERE time > '$time_out' ");
            echo  $the_query_mysqli_query_count = mysqli_num_rows($the_query);

        }


    }

}
users_online();
function is_login(){
    if(isset($_SESSION['user_role'])){
        return true;
    }else{
        return false;
    }
}

function is_admin(){
    global $conn ; 
    if(is_login()){
        $query = "SELECT user_role FROM users WHERE username = ".$_SESSION['username']." ";
        $send_query = mysqli_query($conn , $query );
        $row = mysqli_fetch_array($send_query);
        if($row['user_role'] == "admin"){
            return true;
        }else{
            return false;
        }

    }
}








