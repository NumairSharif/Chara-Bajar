<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <form action="signup.php" method="post">
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="number" placeholder="Phone Number" name="p_num" required><br><br>
            <input type="text" placeholder="Location" name="loca"><br><br>
            <input type="Submit" name="Signup" value="signup">
    </form>
    
    
    <?php
try{
    $conn=new PDO("mysql:host=localhost:3306;dbname=charabazar;","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    ?>
    <script>
        window.alert("Database not Connected");
    </script>
    <?php
}

if(isset($_POST['Signup']))
{
	$name=$_POST['name'];
	$pass=$_POST['password'];
	$mail=$_POST['email'];
    $location=$_POST['loca'];
    $phoneN=$_POST['p_num'];
	///echo "<script>console.log('$name $pass $mail $location $phoneN')</script>";
	$query="INSERT INTO customers(CUSTOMER_NAME,EMAIL,PHONE,LOCATION,PASS) VALUES ('$name','$mail',$phoneN,'$location','$pass')";
    echo "$query";
    $returnvalue=$conn->exec($query);
	if($returnvalue){
        ?>
        <script>
            window.location.assign("index.php");
        </script>
        <?php
	}
    else{
        echo "not found";
    }
}
?>
</body>

</html>


