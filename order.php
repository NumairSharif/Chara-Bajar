<!DOCTYPE html>
<html>

  <head>
    <title> Order </title>
  </head>
    <body>
    <?php
session_start();
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
      
      

if(!empty($_SESSION["order"]))
{
  ?>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">     
      
<tr>
<th width="40%"> Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
    </thead>  
<?php  
$total = 0;
foreach($_SESSION["order"] as $keys => $values)
{
?>
      
      
<tr>
<td><?php echo $values["PRODUCT_NAME"]; ?></td>
<td><?php echo $values["QUANTITY"] ?></td>
<td> <?php echo $values["PRICE"]; ?></td>
<td> <?php echo number_format($values["QUANTITY"] * $values["PRICE"], 2); ?></td>
</tr>
    
   <?php 
$total = $total + ($values["QUANTITY"] * $values["PRICE"]);
}
?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right"> <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
  <?php
  echo '<a href="order.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;
  <a href="payment.php"><button class="btn btn-success pull-right">Payment</button></a>';
?>      
   </div>    
<?php
}
if(empty($_SESSION["order"]))
{
  ?>

        <h1>EMPTY</h1>
        
    <?php
}
?>
        
<?php
        
 if(isset($_POST["add"]))
{
if(isset($_SESSION["order"]))
{
$item_array_id = array_column($_SESSION["order"], "PRODUCT_ID");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["order"]);

$item_array = array(
'PRODUCT_ID' => $_GET["id"],
'PRODUCT_NAME' => $_POST["hidden_name"],
'PRICE' => $_POST["hidden_price"],
'QUANTITY' => $_POST["quantity"]
);
$_SESSION["order"][$count] = $item_array;
echo '<script>window.location="order.php"</script>';
}
else
{
echo '<script>alert("Products already added to cart")</script>';
echo '<script>window.location="order.php"</script>';
}
}
else
{
$item_array = array(
'PRODUCT_ID' => $_GET["id"],
'PRODUCT_NAME' => $_POST["hidden_name"],
'PRICE' => $_POST["hidden_price"],
'QUANTITY' => $_POST["quantity"]
);
$_SESSION["order"][0] = $item_array;
}
}       
        
 ?>
        <?php
        ?>
        
        

</body>
</html>

    