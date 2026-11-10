<?php
$conn = mysqli_connect("localhost", "abdallah", "sharawneh@2005", "my_project");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>