<?php
    session_start();
    $booklist=$_SESSION['booklist'];
?>
<html>
    <head>
        <title>Books list</title>
        <center><h1>LIBRARY BOOKS LIST</h1></center>
        <hr>
        <style>
            body{
   
    background-image: url("p2.jpg");


}
        </style>
    </head>
    <body>


        <style>
            #filter{
                margin :10px;
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                float:right;
            }
            #bl{
                background-color:white;
                width:62%;
                padding:20px;
                float:right;
            }
            .container{
                background: #fff;
                padding: 25px 35px;
                border-radius: 5px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                            0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .container{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -13%);
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <a href="filter.php"><button id="filter">filter</button></a>
        <br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
    <?php
        if($_SESSION['booklist']){
            for($i=0;$i<count($booklist);$i++){
                ?>
                <div>
                    <center>
                <b>Title :  </b><?php echo $booklist[$i]['title']?><br><br>
                <b>Author : </b><?php echo $booklist[$i]['author']?><br><br>
                <b>Subject : </b><?php echo $booklist[$i]['subject']?><br><br>
                <b>Publish Date : </b><?php echo $booklist[$i]['pdate']?><br><br>
            </center>
            <hr>
              
    <?php
            }
        }
    ?>
    </div>
    </div>
    </body>
</html>
