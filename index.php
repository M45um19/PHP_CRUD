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
        <h1 class="d-flex justify-content-center">PHP CRUD</h1>
        <br>
        <a type="button" href="add_user.php" class="btn btn-success">Add User</a>
        <br>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $database_name = "php_crud";

                  $connection = mysqli_connect($servername, $username, $password, $database_name) or die("Not Connected" . mysqli_error());

                  $query = "SELECT * FROM user";
                  $users = mysqli_query($connection, $query);

                  while($row = mysqli_fetch_assoc($users)){
                ?>
                    <th scope="row"><?php echo $row["id"] ?></th>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["contact_no"] ?></td>
                    <td><?php echo $row["adress"] ?></td>
                    <td>
                        <a type="button" href="edit_user.php?id=<?php echo $row['id'] ?>"
                            class="btn btn-primary">Edit</a>
                        <a type="button" href="delete_user.php?id=<?php echo $row['id'] ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php 
                }
                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>