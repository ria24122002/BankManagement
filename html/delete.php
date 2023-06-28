<?php

include '../connection.php';

$id = $_GET['id'];

$q = " DELETE FROM `user_info` WHERE id = $id ";

mysqli_query($con, $q);

header('location:customer.php');

?>