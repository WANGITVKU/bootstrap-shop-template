<?php
session_start();
// unset($_SESSION['cart']);
$id=$_GET['idsp'];
$size = $_POST["size"];
// echo $_POST["size"];
if(isset($_SESSION['cart'][$id][$size]))
{
$qty = $_SESSION['cart'][$id][$size] + 1;
}
else
{
    $qty=1;
  

}
$_SESSION['cart'][$id][$size]=$qty;
header("location:../cart.php");

 
?>