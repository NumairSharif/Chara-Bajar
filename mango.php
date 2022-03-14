<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
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
    $mango = " SELECT PRODUCT_NAME,QUANTITY,PRICE,PRODUCT_TYPE,SOIL_RECOMMENDATION,FERTILIZER_RECOMMENDATION,IMAGE FROM products WHERE PRODUCT_NAME='Mango'";
    $returnvalue = $conn->query($mango);
    $rowcount=$returnvalue->rowCount();
    $data=$returnvalue->fetchAll();
    if($rowcount==1){
        $row=$data[0];
    ?>
    <img src="<?php echo $row[6] ?>" height="200px" width="200px">
    <p>Name: <?php echo $row[0] ?></p>
    <p>Quantity: <?php echo $row[1] ?></p>
    <p>Price: <?php echo $row[2] ?></p>
    <p>Product type: <?php echo $row[3] ?></p>
    <p>Soil: <?php echo $row[4] ?></p>
    <p>Fertilizer: <?php echo $row[5] ?></p>
    <butto><a href="order.php">Order</a></butto>
    <?php
    }
    ?>
</body>

</html>






