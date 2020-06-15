<?php
session_start();
//header('location:index.php');

$connection =  mysqli_connect('localhost','root','');

mysqli_select_db($connection, 'CLINIC_MANAGEMENT_DATABASE');

$name = $_POST['username'];
$password = $_POST['password'];

// if(isset($name == " ") || isset($password == " "))
// {
//     echo "fields cannot be left blank";
// }

$query = "SELECT * FROM registration_and_login WHERE USERNAME = '$name' && PASSWORD = '$password' ";

$result = mysqli_query($connection, $query);

$num = mysqli_num_rows($result);

if( $num == 1)
{
    $_SESSION['username'] = $name;
    header('location:home.php');
}
else
{
    header('location:index.php');
}

?>