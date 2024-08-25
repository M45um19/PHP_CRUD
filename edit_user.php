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
        <h1 class="d-flex justify-content-center">EDIT USER</h1>
        <br>
        <hr>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="w-50 p-3">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databse_name = "php_crud";
    
    $connection = mysqli_connect($servername, $username, $password, $databse_name);

    $edit_post_id = $_GET['id'];
    $query_read = "SELECT * from user WHERE id = $edit_post_id";
    $result = mysqli_query($connection, $query_read);
    while($row = mysqli_fetch_assoc($result)){
?>
            <div class="form-group">
                <label for="Name">Name</label>
                <input name="name" value="<?php echo $row['name'] ?>" type="text" class="form-control"
                    placeholder="Edit Name">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input name="email" value="<?php echo $row['email'] ?>" type="email" class="form-control"
                    placeholder="Edit Email">
            </div>
            <div class="form-group">
                <label for="Email">Contact Number</label>
                <input name="contact" value="<?php echo $row['contact_no'] ?>" type="number" class="form-control"
                    placeholder="Edit Contact Number">
            </div>
            <div class="form-group">
                <label for="Email">Address</label>
                <input name="address" value="<?php echo $row['adress'] ?>" type="text" class="form-control"
                    placeholder="Edit Address">
            </div>
            <hr>
<?php
      }
?>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($connection,$_POST['name']);
            $email = mysqli_real_escape_string($connection,$_POST['email']);
            $contact = mysqli_real_escape_string($connection,$_POST['contact']);
            $address = mysqli_real_escape_string($connection,$_POST['address']);

            $query_update = "UPDATE user SET 
                        name='$name', email='$email', contact_no='$contact', adress='$address'
                        WHERE id='$edit_post_id'";
            if(mysqli_query($connection, $query_update)){
                header("location: http://localhost/php_crud");
            } else{
                echo "ERROR: Hush! Sorry $query. "
                . mysqli_error($connection);
            }
        }
        mysqli_close($connection)
?>
</body>

</html>