<?php
session_start();
require "../db.php";


$title = $_POST['title'];
$category = $_POST['category'];
$desp = $_POST['desp'];
$user_id =  $_SESSION['id'];


$uploaded_file = $_FILES['image'];
$uploaded_file_name = $uploaded_file['name'];
$after_explode = explode('.',$uploaded_file_name);
$extention = end($after_explode);
$alloewd_extention = array('jpg','png','jpeg');
if(in_array($extention,$alloewd_extention)){
  if($uploaded_file['size'] <=100000000){
        $insert = "INSERT INTO works(user_id,title,category,desp)VALUES($user_id,'$title','$category','$desp')";
        $insert_result = mysqli_query($db_connection,$insert);
        $last_id = mysqli_insert_id($db_connection);
        $file_name = $last_id.'.'.$extention;
        $new_location = '../uploads/works/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'],$new_location);
        $update_image = "UPDATE works SET image='$file_name' WHERE id=$last_id";
        $update_image_result = mysqli_query($db_connection,$update_image);                        




        header('location:add_work.php');
  }
  else{
    $_SESSION['size'] = 'Max size 1 mb';
    header('location:add_work.php');
  }
}
else{
$_SESSION['extention'] = 'Invalid Extention';
header('location:add_work.php');
}




?>
