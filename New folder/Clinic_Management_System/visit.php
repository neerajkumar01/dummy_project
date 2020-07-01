<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location:index.php');
}
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
 $_GET['ad'];
 $_GET['am'];
 $_GET['po'];
 $_GET['pt'];
 $_GET['amt'];
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form_Update</title>
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
            height:99%;
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
            font-size: 1.5em;
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

      
 
        @media(min-width:400px)
        {                   
            .icon-box
            {
                margin-top:-11%;
                margin-right:3%;
                text-align:right;

            }

            .box_anchor i,h5,a
            {
                display:inline;
                text-decoration:none;    
                font-size:13px;
                color:white;
            }

            .login_form_btn
            {
               font-size:12px; 
            }
        }

        @media(min-width:700px)
        {                   
            .icon-box
            {
                margin-top:2%;
                margin-right:3%;
                text-align:right;

            }

            .box_anchor i,h5,a
            {
                display:inline;
                text-decoration:none;    
                font-size:16px;
                color:white;
            }

            .login_form_btn
            {
               font-size:16px; 
            }
        }

        @media(min-width:400px)
        {
            .adjust
            {
                display:inline;
                width:42%;
            }
        }
        @media(min-width:700px)
        {
            .adjust
            {
                display:inline;
                width:46%;
            }
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
                 
       
            <form class="form-box" action="visit.php" method = "GET" class="form_add">

                <h1>Confirmation Page</h1>               

                <input style="visibility:hidden;"  type="text" name="pid" placeholder="id" value="<?php echo $_GET['d'] ?>" required><br><br>

                <input class="inputboxes" type="text" name="name" placeholder="Enter Name" value="<?php echo $_GET['m'] ?>" readonly><br><br>
                <!-- <textarea class="inputboxes"rows="5"  name="paddress" placeholder="Enter address" style="resize:none"></textarea> -->
                <input class="inputboxes" type="text" name="address" placeholder="Enter address" value="<?php echo $_GET['a'] ?>" readonly>
                <br><br>
                <input class="inputboxes adjust" type="text" name="amount" placeholder="amount to deduct" value="<?php echo $_GET['am'] ?>" readonly>
                <label for="">-</label>
                <input class="inputboxes adjust" type="text" name="deduct" placeholder="amount to deduct" value="<?php echo $_GET['amt'] ?>" readonly>
                <br><br>
                <input class="inputboxes" type="text" name="misc" placeholder="additional Charges">
                <br><br>
                <input  class="inputboxes" type="text" maxlength="10" name="phonenumone"  pattern="[0-9]{10}" placeholder="Enter Phone Number" value="<?php echo $_GET['po'] ?>" readonly><br><br>
                <input class="inputboxes" type="text" maxlength="10" name="ph"  pattern="[0-9]{10}" placeholder="Enter Phone Number two" value="<?php echo $_GET['pt'] ?>" readonly><br><br>
                <input style="margin-left:15%;width:70%" type="submit" class="login_form_btn" name="submit" value="Debit"/><br><br>
               
            </form> 
            
            <!-- add a missalanious here and it it done send the data to one more table we got this homei -->
            <div class="icon-box">
                <a href="display.php" class="box_anchor">
                        <i class="fas fa-chevron-circle-left"></i>
                        <h5>Back</h5> 
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
                $m = $_GET['name'];
                $ad = $_GET['address'];
                $deductone = $_GET['amount'];
                $deducttwo = $_GET['deduct'];
                $misc = $_GET['misc'];
                $amt = $deductone-$deducttwo-$misc;
                $amountpaid = abs($misc+$deducttwo);

                if($amt >=0)
                {
                    $query = "UPDATE pdetails SET  AMOUNT='$amt' WHERE PID='$d' "; 
                    $data = mysqli_query($connection, $query);

                    $dt = date("Y/m/d");
                    $timeentered=date("Y/m/d h:i:s");//TIMEENTERED

                    $queryone = "INSERT INTO dailyrecord(PNAME, PADDRESS, DATECAME, ENTRYTIME, CURRENTAMOUNT, AMOUNTPAID, PID) 
                    VALUES('$m','$ad','$timeentered','$dt','$amt','$amountpaid','$d')";
                    $dataone = mysqli_query($connection, $queryone);
                    // ATTENDED BY THE  PERSON SESSION NAME
                }
                else
                {
                    echo"Insufficient Balence ";
                }  

                if($data)
                    {
                        echo "updated successfully. <a href ='display.php'>click to see the updated record</a>";
                    }
                    else
                    {
                        echo"Data Cannot Be updated";
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

