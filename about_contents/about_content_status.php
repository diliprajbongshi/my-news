<?php
require "../db.php";
$id = $_GET['id'];

$update_about_content_status = "UPDATE banner_contents SET status=0";
$update_about_content_status_result = mysqli_query($db_connection,$update_about_content_status);

$update_about_content_status2 = "UPDATE banner_contents SET status=1 WHERE id=$id";
$update_about_content_status_result2 = mysqli_query($db_connection,$update_about_content_status2);
header('location:view_banner_content.php');


?>