<?php
    $email="";
    $password="";
    if(isset($_POST["email"])){
        $email=$_POST["email"];
    }
    if(isset($_POST["pass_word"])){
        $password=$_POST["pass_word"];
    }
    try{
        $conn=new PDO("mysql:host=localhost:3306;dbname=charabazar;","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){
        ?>
        <script>
            window.alert("database not connected");
        </script>
        <?php
    }
    $userquery = "SELECT * FROM customers WHERE EMAIL='$email' AND PASS='$password'";
    $returnvalue = $conn->query($userquery);
    $rowcount = $returnvalue->rowCount();
    if($rowcount == 1){
        ?>
        <script>
            window.location.assign("home.php");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            window.location.assign("index.php");
        </script>
        <?php
    }

?>