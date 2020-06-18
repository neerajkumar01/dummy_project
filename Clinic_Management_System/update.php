<?php
error_reporting(0);
$server = "localhost";
$username ="root";
$password = "";
$databasename = "CLINIC_MANAGEMENT_DATABASE";

$connection = mysqli_connect($server, $username,$password);
mysqli_select_db($connection, $databasename);

 $_GET['d'];
 $_GET['m'];
 $_GET['a'];
 $_GET['po'];
 $_GET['pt'];
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
            height:90%;
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
            top: 43%;
            left: 50%;
            transform: translate(-50%, -50%);
            width:45%;
           
        }
        h1
        {
            font-size: 37;
            text-align:center;
            /* margin-bottom:5%; */
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
                 
       
            <form class="form-box" action="update.php" method = "GET" class="form_add">

                <h1>Patient details form</h1>
                <input style="visibility:hidden;"  type="text" name="pid" placeholder="id" value="<?php echo $_GET['d'] ?>" required><br><br>

                <input class="inputboxes" type="text" name="name" placeholder="Enter Name" value="<?php echo $_GET['m'] ?>" required><br><br>
                <!-- <textarea class="inputboxes"rows="5"  name="paddress" placeholder="Enter address" style="resize:none"></textarea> -->
                <input class="inputboxes" type="text" name="address" placeholder="Enter address" value="<?php echo $_GET['a'] ?>" required>
                <br><br>
                <input  class="inputboxes" type="text" maxlength="10" name="phonenumone"  pattern="[0-9]{10}" placeholder="Enter Phone Number" value="<?php echo $_GET['po'] ?>" required><br><br>
                <input class="inputboxes" type="text" maxlength="10" name="ph"  pattern="[0-9]{10}" placeholder="Enter Phone Number two" value="<?php echo $_GET['pt'] ?>" required><br><br>
                <input type="submit" class="login_form_btn" name="submit" value="update"/>
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
            <div class="serverside" style="font-size:0.6em;margin-top:1%;margin-left:29%;margin-right:10%;">
            <?php
            if($_GET['submit'])
            {
                $d = $_GET['pid'];
                $pname = $_GET['name'];
                $paddress = $_GET['address'];
                $phonenumone = $_GET['phonenumone'];
                $phonenumtwo = $_GET['ph'];

             
                $query = "UPDATE pdetails SET PNAME='$pname', PADDRESS='$paddress', PHONENUMONE='$phonenumone', PHONENUMTWO='$phonenumtwo' WHERE PID='$d' "; 
                $data = mysqli_query($connection, $query);
                   
                if($data)
                    {
                        echo "updated successfully. <a href ='displayupdate.php'>click to see the updated record</a>";
                    }
                    else
                    {
                        echo"not updated";
                    }
            }
            else
            {
                echo " click on update";
            }
            ?>
            </div>
            <!--  -->    
		</div>
    </div>
</body>
</html>

