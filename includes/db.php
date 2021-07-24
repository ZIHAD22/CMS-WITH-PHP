<?php






$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "cms";

foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}


$conn = new mysqli(DB_HOST,  DB_USER,  DB_PASS, DB_NAME);
global $conn;

// if ($conn->connect_error) {

//     die("connection fild" . $conn->connect_error);
// } else {
//     echo  "connection is succesd the ";
// }
