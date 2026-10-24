<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config.php';
$query = mysqli_query($conn, "SELECT * FROM employee");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Employee Table</title>
</head>
<body>
    <div class="header">
    <table border="1">
        <caption>Employee Table</caption>
        <thead>
            <tr>
                <th>emp id</th>
                <th>fullname</th>
                <th>email</th>
                <th>date of birth</th>
                <th>date of joining</th>
                <th>salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $no=1;
            while($employee = mysqli_fetch_assoc($query)):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $employee['fullname'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td><?= $employee['date_of_birth'] ?></td>
                <td><?= $employee['date_of_joining'] ?></td>
                <td><?= $employee['salary'] ?></td>
                <td>
                    <a href="update.php?id=<?= $employee['emp_id'] ?>">update</a>
                    <a href="action.php?id=<?= $employee['emp_id'] ?>&action=delete">delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
       <a href="add.php"><input type="button" value="Add Employee" ></a>
    </div>
    
</body>
</html>