<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP CRUD</title>
</head>

<body>


    <div class="container">
        <br>
        <h1 class="d-flex justify-content-center">ADD USER</h1>
        <br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="w-50 p-3">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input name="number" type="number" class="form-control" placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control" placeholder="Enter Addressr">
            </div>
            <hr>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>



    </div>
</body>
<?php
 if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "php_crud";

    $connection = mysqli_connect($servername, $username, $password, $database_name); 

    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $contact = mysqli_real_escape_string($connection,$_POST['number']);
    $address = mysqli_real_escape_string($connection,$_POST['address']);

    $query = "INSERT INTO user (name, email, contact_no, adress)
                VALUES ('$name', '$email', '$contact', '$address')";
    if(mysqli_query($connection,$query)){
        header('location: http://localhost/php_crud');
    } else{
        echo "ERROR: Hush! Sorry $query. "
                . mysqli_error($connection);
    }
    mysqli_close($connection);
 }
?>

</html>
