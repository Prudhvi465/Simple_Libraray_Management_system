<!DOCTYPE html>
<html>
    <head>
        <title>way page</title>
        <style>
            body{
   
    background-image: url("plib.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
#loginbtn{
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                margin :10px;
        }
        </style>
    </head>
    <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <center><button id="loginbtn" type="submit">Go To Library</button><br><br></center>
    </form>
</body>
</html>


<?php
include('connect.php');
error_reporting(0);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $sql=mysqli_query($connect,"SELECT * FROM library");
        if(mysqli_num_rows($sql)>0){
            $book=$connect->query( "SELECT * FROM library");
            $booklist=mysqli_fetch_all($book , MYSQLI_ASSOC);
            $_SESSION['booklist']=$booklist;
                            echo"
                            <script>
                            window.location='listbook.php';
                            </script>
                            ";
        }
}
?>
