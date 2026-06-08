<?php
include "includes/config.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM products WHERE id='$id'");

header("location:view_products.php");
?>