<?php
session_start();
//initializing the variables below

$username = "";
$email = "";

$errors = array();
//connection to database 

$db = mysqli_connect('localhost','root','','clinic_database') or die('cannot connect');

//register user below

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

//form validation
if(empty($username)){array_push($errors, "");}

if(empty($email))  
{
        array_push($errors, "");
}

if(empty($password))    
{
    array_push($errors, "");
}

if($password != $confirm_password)
{
    array_push($errors, "");
}

//check db for existing user_name
$username_check_query = "SELECT * FROM table_login WHERE USERNAME = '$username' OR EMAIL = '$email' LIMIT 1";

$results = mysqli_query($db, $username_check_query);
$user = mysqli_fetch_assoc($results);

if($user)
{
    if($user['USERNAME'] === $username){array_push($errors, "User Name Already Exists");}
    if($user['EMAIL'] === $email){array_push($errors, "Email is aready registered");}

}

//register if no errors all set to go

if(count($errors) == 0)
{
    $password1 = md5($password); //md 5 encryption
    $query = "INSERT INTO table_login (USERNAME,EMAIL,PASSWORD) VALUES ('$username','$email','$password1')";

    mysqli_query($db,$query);
    $_SESSION['USERNAME'] = $username;
    $_SESSION['SUCCESS'] = "YOUARE LOGGED IN";

    header("location: home.php");
}







?>