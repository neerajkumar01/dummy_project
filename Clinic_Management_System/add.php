<?php 

    session_start();

    if(!isset($_SESSION['username']))
    {
        header('location:index.php');
    }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Details_Form</title>
    <link rel="stylesheet" href="css/a.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        .outer_box
        {
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%, -50%);
            width:60%;
            height:80%;
            border: transparent;
            outline:none;
            border-radius:30px;
            background:rgba(0, 0, 0, 0.658);
            z-index:410;
            cursor:pointer;
        }
        .form-box
        {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width:45%;
           
        }
        h1
        {
            font-size: 37;
            text-align:center;
            margin-bottom: 5%;
        }
        .inputboxes
        {
            padding: 9px;
            margin:3px 0;
            width:97%;
            border: 1px solid rgba(255, 255, 255, 0.808);
            border-radius: 20px;
            background: none;
            outline: transparent;
        }
        .login_form_btn
        {
            margin-left:10%;

        }
        .login_form_btn:hover
        {
            margin-left:10%;
            box-shadow:0 0 15px 1800px rgba(7, 7, 7, 0.534);   

        }
.icon-box
{
    margin-top:3%;
    margin-right:3%;
    text-align:right;

}
.box_anchor i,h5,a
{
    display:inline;
    text-decoration:none;    
    color:white;
}
.box_anchor i
{
    text-decoration:none;    
    color:white;
}
    </style>
</head>
<body>
	<div class="container_class">
        
        <div class="outer_box">
                 
       
            <form class="form-box" action="add.php" method = "post" class="form_add">
                <h1>Patient details form</h1>
        
                <input class="inputboxes" type="text" name="pname" placeholder="Enter Name" required><br><br>
                <!-- <textarea class="inputboxes"rows="5"  name="paddress" placeholder="Enter address" style="resize:none"></textarea> -->
                <input class="inputboxes" type="text" name="paddress" placeholder="Enter address" required>
                <br><br>
                <input class="inputboxes" type="text" maxlength="10" name="phonenumone"  pattern="[0-9]{10}" placeholder="Enter Phone Number" required><br><br>
                <input class="inputboxes" type="text" maxlength="10" name="phonenumtwo"  pattern="[0-9]{10}" placeholder="Enter Phone Number" required><br><br>
                <button type="submit" class="login_form_btn">Submit</button>
                <button type="reset" class="login_form_btn">Reset</button>
            </form>  
            <!--  -->
            <div class="icon-box">
                <a href="home.php" class="box_anchor">
                        <i class="fa fa-home"></i>
                        <h5>home</h5> 
                </a>
                
                <br>
                <br>
                
                <a href="logout.php" class="box_anchor">
                        <i class="fas fa-power-off"></i>
                        <h5>Log_out</h5> 
                </a>
            </div>
            <!--  -->    
		</div>
    </div>
    
    <?php
        $server = "localhost";
        $username ="root";
        $password = "";
        $databasename = "CLINIC_MANAGEMENT_DATABASE";

        $connection = mysqli_connect($server, $username,$password);
        mysqli_select_db($connection, $databasename);

        $pname = $_POST['pname'];
        $paddress = $_POST['paddress'];
        $phonenumone = $_POST['phonenumone'];
        $phonenumtwo = $_POST['phonenumtwo'];
    
        // CREATE TABLE `clinic_management_database`.`pdetails` 
        // ( `PID` INT NOT NULL AUTO_INCREMENT ,`PNAME` VARCHAR(255) 
        // NOT NULL , `PADDRESS` VARCHAR(255) NOT NULL ,
        // `PHONENUMONE` INT(10) NOT NULL ,
        // `PHONENUMTWO` INT(10) NOT NULL ,
        // PRIMARY KEY (`PID`)) ENGINE = InnoDB; 
        $selectquery = "SELECT * FROM pdetails WHERE PNAME = '$pname' AND PHONENUMONE = '$phonenumone'";
        
        $result = mysqli_query($connection, $selectquery);

        $rowcount = mysqli_num_rows($result);

        if($rowcount == 1)
        {
            echo "This Person has Already Been Registered";
        }
        else
        { 
            $query = "INSERT INTO pdetails(PNAME, PADDRESS, PHONENUMONE, PHONENUMTWO) VALUES('$pname','$paddress','$phonenumone','$phonenumtwo')";
            mysqli_query($connection, $query);
        }
    ?>
</body>
</html>
