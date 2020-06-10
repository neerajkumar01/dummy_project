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
    <title>Document</title>
    <link rel="stylesheet" href="css/a.css">
    <link rel="stylesheet" href="css/all.min.css">

    <style>
        .header
        {
            position:absolute;
            display:flex;
        }
        .header .subheader1
        {
            flex:1;
        }
        .subheader2
        {
            text-align:end;
        }
        @media(min-width: 700px) 
        {
            
        
                .homeflexcontainer
                {
                    position: absolute;
                    top:10rem;
                    left:3.5%;
                    right:3.5%;
                    display: flex;
                    justify-content: space-between;
                    text-align: center;

                }


                .homeflexcontainer div
                {
                    border:3px solid white;
                    border-radius: 50%;
                    padding: 70px;
                    width: 13%;
                    

                }
        }
                .welcome
                {
                    
                    margin-top:3%;
                    text-align:center;
                    font-weight:700;
                }

                .homeflexcontainer .box-1
                {
                    border:3px solid yellow;

                }

                .homeflexcontainer .box-2
                {
                    border:3px solid rgb(67, 178, 247);

                }

                .homeflexcontainer .box-3
                {
                    border:3px solid rgb(15, 250, 113);

                } 
                .box_anchor
                {
                    text-decoration: none;
                }


</style>
</head>
<body>

        <div class="container_class">
        <h3 class="welcome">
        Welcome <?php echo $_SESSION['username']; 
        ?>
        </h3>
        <a href="logout.php" style="float:right;margin-right:2%;">Log_Out</a>
            <div class="homeflexcontainer">
        
                    <div class="box-1">   
                        <a href="add.html" class="box_anchor">
                            <i class="fa fa-2x fa-home"></i>
                            <h2>Add the Details</h2> 
                        </a>
                    </div>

                    <div class="box-2">   
                        <a href="#" class="box_anchor"> 
                            <i class="fas fa-2x fa-chalkboard-teacher"></i>
                            <h2>Update the Details</h2>
                        </a>
                    </div>

                    <div class="box-3">
                        <a href="#" class="box_anchor">    
                            <i class="fas fa-2x fa-search"></i>
                            <h2>Search the Details</h2>
                        </a>
                    </div>       
            </div>
        </div>
</body>
</html>