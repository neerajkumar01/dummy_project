<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location:index.php');
}
error_reporting(0);
$server = "localhost"; 
$username = "root";
$password = "";
$databasename = "CLINIC_MANAGEMENT_DATABASE";

$connection = mysqli_connect($server, $username, $password);
mysqli_select_db($connection, $databasename);

if(isset($_POST['search']))
{
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $query = "SELECT * FROM dailyrecord WHERE ENTRYTIME BETWEEN '$startdate' AND '$enddate' ORDER BY PID";
    $data = mysqli_query($connection, $query);
    $total = mysqli_num_rows($data);
}

if(isset($_POST['submit']))
{
    $searchbar = $_POST['searchbar'];
    $queryone = "SELECT * FROM dailyrecord WHERE PNAME = '$searchbar' OR PADDRESS = '$searchbar' ORDER BY PID";
    $dataone = mysqli_query($connection, $queryone);
    $totalone = mysqli_num_rows($dataone);
}

// $query = "SELECT * FROM pdetails ";
//$data = mysqli_query($connection, $query);



// //data from second database
// $query1 = "SELECT * FROM consultation WHERE CONSULTATIONID=1";
// $dataone=mysqli_query($connection, $query1);
// $dataamt=mysqli_fetch_assoc($dataone);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/a.css">
    <link rel="stylesheet" href="css/all.min.css">

    <style>
        .container_class
        {
            text-align:center;
            position: absolute;

        }
        
        .flex_container
        {
            position: relative;
            top:5%;
        }

        h3
        {
            text-align:center;
            margin-bottom: 2%;

        }
        .search-date
        {
            padding:15px;
            width:20%;
            border-radius:10px;
        
            background: rgba(0, 0, 0, 0.432);
            outline:none;
            border: 1px solid white;
            margin-bottom: 1%;
            margin-top:1%;
        }
        .search-box
        {
            padding:15px;
            width:30%;
            border-radius:30px;
        
            background: rgba(0, 0, 0, 0.432);
            outline:none;
            border: 1px solid white;
            margin-bottom: 3%;
            margin-top:1%;
        }

        .search-submit-button
        {
            background:rgba(10, 10, 10, 0);
            outline:transparent;
            border: 1px solid rgba(255, 255, 255, 0);
            padding:10px;
            position: relative;
            top:5px;
            
        }
        .search-submit-button i:hover
        {
            transition:1s;
            color: rgb(221, 108, 3);
            /* rgb(76, 255, 5);     */
        }
    
        table,tr,td,th
        {
             margin-left:auto; margin-right:auto; 
             padding: 10px;
        border: 1px solid rgb(243, 243, 243);
        border-collapse: collapse;
        }
        th{border:2.5px solid rgb(255, 255, 255);}
    
    </style> 
</head>
    <body>
        <div class="container_class">
            <div class="flex_container">
                <h3>DailyJournal</h3>               <a href="home.php"><i class="fa fa-home"></i>home</i></a>

                <div class="left_box">
                    <form action="ledger.php" method=post>
                   <input type="date" name="startdate" class="search-date"  placeholder="Enter the Dete"> 
                   &nbsp;
                   <input type="date" name="enddate" class="search-date"  placeholder="Enter the Dete">

                   <button type="submit" name="search" class="search-submit-button"><i class="fas fa-2x fa-search"></i></button>
                   </form>
                    
                </div>
                <div class="left_box">
                    <form action="ledger.php" method=post>
                   <input type="text" class="search-box" name="searchbar" placeholder="Enter the Details to Search Eg: name, phone number">
                 
                   <button type="submit" name="submit" class="search-submit-button"><i class="fas fa-2x fa-search"></i></button>
                   </form>
                    
                </div>

              <div class="right_box"> 
                    <table>
                        <tr>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>CURRENT AMOUNT</th>
                            <th>AMOUNT PAID</th>
                            <th>DATE</th>
                        </tr>
                            <?php

                                    if($total != 0)
                                    {
                                        while($result = mysqli_fetch_assoc($data))
                                        {
                                            echo"
                                            <tr>
                                                <td>".$result['PNAME']."</td>
                                                <td>".$result['PADDRESS']."</td>
                                                <td>".$result['CURRENTAMOUNT']."</td>
                                                <td>".$result['AMOUNTPAID']."</td>
                                                <td>".$result['ENTRYTIME']."</td>
                                            </tr>";
                                        }                               
                                    }
                                    else  if($totalone != 0)
                                    {
                                        while($res = mysqli_fetch_assoc($dataone))
                                        {
                                            echo"
                                            <tr>
                                                <td>".$res['PNAME']."</td>
                                                <td>".$res['PADDRESS']."</td>
                                                <td>".$res['CURRENTAMOUNT']."</td>
                                                <td>".$res['AMOUNTPAID']."</td>
                                                <td>".$res['ENTRYTIME']."</td>         
                                            </tr>";
                                        }                               
                                    }
                                    else
                                    {
                                        echo"no records found";
                                    }

                                  
                            ?>
                    </table>
               </div>
            </div>
        </div>
    </body>
</html>
