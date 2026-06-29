<?php

$con = mysqli_connect("localhost", "root", "", "lab_automation");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>