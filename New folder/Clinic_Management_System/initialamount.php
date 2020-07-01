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
        body
        {
            overflow-x:hidden;
        }

        .outer_box
        {
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%, -50%);
            width:60%;
            height:50%;
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
            font-size: 1.7em;
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
   
        @media(min-width:400px)
        {
            .icon-box
            {
                margin-top:-3%;
                margin-right:3%;
                text-align:right;
                font-size:17px;
            }
        }
        @media(min-width:700px)
        {
            .icon-box
            {
                margin-top:5%;
                margin-right:3%;
                text-align:right;
            }
        }

        .box_anchor i,h6,a
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
                 
       
            <form class="form-box" action="initialamount.php" method = "post">
                <h1>Consultation Fee</h1>
        
                <input class="inputboxes" type="text" name="fee" placeholder="Enter New Consultation Fees" required><br><br>
                <button type="submit" class="login_form_btn">Submit</button>
                <button type="reset" class="login_form_btn">Reset</button>
            </form>  
            <!--  -->
            <div class="icon-box">
                <a href="home.php" class="box_anchor">
                        <i class="fa fa-home"></i>
                        <h6>home</h6> 
                </a>
                
                <br>
                <br>
                
                <a href="logout.php" class="box_anchor">
                        <i class="fas fa-power-off"></i>
                        <h6>Log_out</h6> 
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

        $FEE = $_POST['fee'];

        $selectquery = "SELECT * FROM consultation";
        
        $result = mysqli_query($connection, $selectquery);

        $rowcount = mysqli_num_rows($result);

        if(!$rowcount == 1)
        {
            echo "amount is not defined";
        }
        else
        { 
         // $query = "INSERT INTO consultation(CONSULTATIONFEE) VALUES ('$FEE')";
            $query = "UPDATE consultation SET CONSULTATIONFEE='$FEE'";
            mysqli_query($connection, $query);
        }
    ?>
</body>
</html>
