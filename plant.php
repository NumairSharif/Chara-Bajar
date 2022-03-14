<!DOCTYPE html>
<html>

<head>
    <title>plant</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
        try{
            $conn=new PDO("mysql:host=localhost:3306;dbname=charabazar;","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            ?>
            <script>
                window.alert("Database not connected");
            </script>
            <?php
        }
        $plant = "SELECT PRODUCT_NAME FROM products WHERE PRODUCT_TYPE='plant' ";
        $returnvalue = $conn->query($plant);
        $data = $returnvalue->fetchAll();
        //print_r($data);
        $rowcount = $returnvalue->rowCount();
        for($i=0; $i<count($data);$i++){
            $row=$data[$i];
            if($row[0]=='Mango'){
            ?>
                <a href="mango.php"><?php echo $row[0]?></a><br><br>
            <?php
            }
            else if($row[0]=='jackfruit'){
                ?>
                <a href="jackfruit"><?php echo $row[0]?></a><br><br>
                <?php
            }
            else if($row[0]=='dragon fruit'){
                ?>
                <a href="dragon.php"><?php echo $row[0]?></a><br><br>
                <?php
            }
        }
    ?>
</body>

</html>








