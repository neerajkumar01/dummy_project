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

$search = $_POST['search'];

$query = "SELECT * FROM pdetails WHERE PNAME='$search' OR PHONENUMONE = '$search' OR PHONENUMTWO = '$search'";
// $query = "SELECT * FROM pdetails ";
$data = mysqli_query($connection, $query);

$total = mysqli_num_rows($data);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
            margin-bottom: 2%;

        }
        
        .search-box
        {
            padding:15px;
            width:35%;
            border-radius:30px;
            
            background: rgba(0, 0, 0, 0.432);
            outline:none;
            border: 1px solid white;
            margin-bottom: 5%;
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
                <h3>Update Details</h3><a href="home.php"><i class="fa fa-home"></i>home</i></a>
                <div class="left_box">
                    <form action="displayupdate.php" method="post">
                   <input type="text" class="search-box" name="search" placeholder="Enter the Details to Search Eg: name, phone number">
                 
                   <button type="submit" class="search-submit-button"><i class="fas fa-2x fa-search"></i></button>
                   </form>
                    
                </div>

              <div class="right_box"> 
                    <table>
                        <tr>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>AdharId</th>
                            <th>Amount</th>
                            <th>PHONE NUMBER</th>
                            <th>ALTERNATE NUMBER</th>
                            <th>Edit</th>

                        </tr>
                <?php
                        if($total != 0 && $search != "")
                        {
                            while($result = mysqli_fetch_assoc($data))
                            {
                                echo"
                                <tr>
                                    <td>".$result['PNAME']."</td>
                                    <td>".$result['PADDRESS']."</td>
                                    <td>".$result['ADHARID']."</td>
                                    <td>".$result['AMOUNT']."</td>
                                    <td>".$result['PHONENUMONE']."</td>
                                    <td>".$result['PHONENUMTWO']."</td>
                                    <td><a href='update.php?d=$result[PID]&m=$result[PNAME]&a=$result[PADDRESS]&ad=$result[ADHARID]&am=$result[AMOUNT]&po=$result[PHONENUMONE]&pt=$result[PHONENUMTWO]'>Edit</a></td>
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
