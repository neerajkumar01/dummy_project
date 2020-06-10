<?php

session_start();
header('location:index.php');

$connection =  mysqli_connect('localhost','root','');

mysqli_select_db($connection, 'CLINIC_MANAGEMENT_DATABASE');

$name = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$query = "SELECT * FROM registration_and_login WHERE USERNAME = '$name' ";

$result = mysqli_query($connection, $query);

$num = mysqli_num_rows($result);

if( $num == 1)
{
    echo "Username Already Exists: ";
}
else{
    $registration = "  INSERT INTO registration_and_login(USERNAME, PASSWORD) VALUES ('$name','$password')";
    mysqli_query($connection, $registration);
    echo "Registration Successful";
}

?>
