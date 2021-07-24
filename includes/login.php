<?php
include "db.php";
session_start();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $username =  mysqli_real_escape_string($conn, $username);
    // $password =  mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $user_login_query = mysqli_query($conn, $query);
    if (!$user_login_query) {
        die("QUERY FILD" . mysqli_error($conn));
    }else{
        echo "All ok";
    }
    while ($row = mysqli_fetch_assoc($user_login_query)) {
        $db_user_id = $row["user_id"];
        $db_username = $row["username"];
        $db_user_firstname = $row["user_firstname"];
        $db_user_lastname = $row["user_lastname"];
        $db_user_password = $row["user_password"];
        $db_user_role = $row["user_role"];
    }




if (md5($password) === $db_user_password) {
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;
    header("Location:../admin");
} else {
    header("Location:../registration.php");
}
}