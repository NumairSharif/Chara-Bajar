<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
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
				$conn = new PDO("mysql:host=localhost:3306;dbname=charabazar;","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $ex){
				?>
				<script>
				    window.alert("Database not connected");
				</script>
				<?php
			}
			$userquery = "SELECT CUSTOMER_NAME,PHONE,LOCATION,IMAGE FROM customers WHERE EMAIL='$email' AND PASS='$password'";
			$returnvalue = $conn->query($userquery);
			$table = $returnvalue->fetchAll();
            $rowcount=$returnvalue->rowCount();			
		if($rowcount==1){
		?>
		<table id="table1">
			<thead>
				<tr>
					<th>Name</th>
					<th>phone</th>
					<th>location</th>
					<th>image</th>
				</tr>
			</thead>
		
			<tbody>
			<?php
			for($i=0; $i<count($table); $i++){
				$row=$table[$i];
				?>
				
				<tr>
					<td><?php echo $row[0] ?></td>
					<td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
					<td><img src="<?php echo $row[3] ?>" height="100px" width="100px"></td>
				</tr>
				
				<?php
			}
				
			?>
			</tbody>
		</table>
		<a href="plant.php">plant</a>
		<a href="seed.php">seed</a>
        <a href="soil.php">soil</a>
        <a href="fertilizer.php">fertilizer</a>
		
		<?php
		}
        ?>
		
	</body>
</html>