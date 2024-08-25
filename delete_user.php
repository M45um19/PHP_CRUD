<?php
    $delete_id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "php_crud";

    $connecttion = mysqli_connect($servername, $username, $password, $database_name);

    $query = "DELETE from user where id='$delete_id'";

    if(mysqli_query($connecttion, $query)){
        header("location: http://localhost/php_crud/");
    } else {
        echo mysqli_error($connecttion);
    }

?>