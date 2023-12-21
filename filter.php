<html>
    <head>
        <title>filter page</title>
        <style>
            body{
   
   
    background-image: url("pr.jpg");
    min-height: 380px;
    background-size: 10% 10%;


  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
        </style>
    </head>
    <body>
        <style>
            #backbtn{
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                float:left;
                margin :10px;
            }
            #dropbox{
                padding: 10px;
                border-radius: 5px;
                width: 15%;
            }
            h3,h4{
                color: white;
            }
        </style>
    <a href="listbook.php"><button id="backbtn">Back</button></a>
    <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <br><br>
       <center> <h3>Select Title* : </h3><select id="dropbox" name="title">
            <option value="0">choose</option>
            <option value="Greatest Novelists and their authors">Greatest Novelists and their author</option>
            <option value="First Impressions">First Impressions</option>
            <option value="the red and the black">the red and the black</option>
            <option value="Wuthering Heights">Wuthering Heights</option>
            <option value="The Man who Counted">The Man who Counted</option>
            <option value="The Universal history of Numbers">The Universal history of Numbers</option>
            <option value="Zero">Zero</option>
            <option value="History Of Pi">History Of Pi</option>
            <option value="Indian Story">Indian Story</option>
            <option value="Place called Home">Place called Home</option>
            <option value="Lal Salam">Lal Salam</option>
            <option value="Queen of Fire">Queen of Fire</option>
          </select>
          <h3>Select Author* : </h3><select id="dropbox" name="author">
            <option value="0">choose</option>
            <option value="Jane Austen">Jane Austen</option>
            <option value="Emily Bronte">Emily Bronte</option>
            <option value="Malbha Tahan">Malbha Tahan</option>
            <option value="Charles Selfie">Charles Selfie</option>
            <option value="Bimal Jalal">Bimal Jalal</option>
            <option value="Smriti Irani">Smriti Irani</option>
          </select>
          <h3>Select Subject* : </h3><select id="dropbox" name="subject">
            <option value="0">choose</option>
            <option value="Novel">Novel</option>
            <option value="Maths">Maths</option>
            <option value="Social">Social</option>
          </select>
          <h3>Select Publish Date* : </h3><select id="dropbox" name="pdate">
            <option value="0">choose</option>
            <option value="1985">1985</option>
            <option value="1847">1847</option>
            <option value="1987">1987</option>
            <option value="1985">1985</option>
            <option value="1895">1895</option>
            <option value="1988">1988</option>
          </select>
</center><br><br>
          <center><button id="loginbtn" type="submit">Search</button><br><br><center>
    </form>
    </body>
</html>


<?php
include('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $author=$_POST['author'];
    $subject=$_POST['subject'];
    $pdate=$_POST['pdate'];
    if($title=="0" && $author=="0" && $subject=="0" && $pdate=="0"){
        ?>
        <h3 style="color:white">NO BOOKS FOUND</h3>
        <?php
    }        
    else{
    $sql=mysqli_query($connect,"SELECT * FROM library WHERE title='{$title}' AND author='{$author}' AND subject='{$subject}' AND pdate='{$pdate}'");
    $count=mysqli_num_rows($sql);
    ?><hr>
    <h3> Number of Books Found :</h3> <?php echo $count; ?>
    <hr>
    <?php
        if(mysqli_num_rows($sql)>0){
            $book=$connect->query( "SELECT * FROM library WHERE title='{$title}' AND author='{$author}' AND subject='{$subject}' AND pdate='{$pdate}'");
            $booklist=mysqli_fetch_all($book , MYSQLI_ASSOC);
            if($booklist){
                for($i=0;$i<count($booklist);$i++){
            ?>
            <div clas="container">
             <center><h4>
                <b>Title :  </b><?php echo $booklist[$i]['title']?><br><br>
                <b>Author : </b><?php echo $booklist[$i]['author']?><br><br>
                <b>Subject : </b><?php echo $booklist[$i]['subject']?><br><br>
                <b>Publish Date : </b><?php echo $booklist[$i]['pdate']?><br><br>
            </h4></center>
                <hr>
            <div>
            <?php
                }
        }
            else{
                echo "No Book Found";
            }
        }
    }
}
?>
