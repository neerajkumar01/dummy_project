<?php

session_start();

if(isset($_SESSION['USERNAME']))
{
    $_SESSION['message'] = "You Are Not Loggrd In: Please Login To View This Page:";
    header("location : index.php"); 
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

<?php
    if(insert($_SESSION['SUCCESS'])) : 
?>
    <div class="container_class">
        
            <h3>
            <?php
                echo $_SESSION['SUCCESS'];
                unset($_SESSION['SUCCESS']);
            ?>
            </h3>

    </div>

    <?php endif ?>

    //if user logs in then print the info 

    <?php 
    if(isset($_SESSION['USERNAME'])) : ?>
        <h3>Welcome <?php echo $_SESSION['USERNAME'];?> </h3>
        <button> <a href="home.php?logout = '1' ">Log_Out</a></button>
        <?php endif ?>
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