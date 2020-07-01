<?php

session_start();
if(!isset($_SESSION['username']))
{
    header('location:index.php');
}
header('location:index.php');

$connection =  mysqli_connect('localhost','root','');

mysqli_select_db($connection, 'CLINIC_MANAGEMENT_DATABASE');

$name = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$password1 = md5($password);
$query = "SELECT * FROM registration_and_login WHERE USERNAME = '$name' ";

$result = mysqli_query($connection, $query);

$num = mysqli_num_rows($result);

if( $num == 0 && isset($_SESSION['username']))
{
    $registration = "INSERT INTO registration_and_login(USERNAME, PASSWORD) VALUES ('$name','$password1')";
    $data=mysqli_query($connection, $registration);
    if(isset($data))
    {
        echo "Registration Successful";
    }
}
else{
    
    echo "Username Already Exists: ";
    
}
// else if(!isset($_REQUEST['registercheck']) && !isset($_SESSION['username']) && $_REQUEST['submit'])
// {
    // alert("please login to add new users");
    // function alert($msg)
    // {
    //     echo "<script type='text/javascript'>alert('$msg');</script>";
    // }
    // header('location:index.php');
// }
?>
