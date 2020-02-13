<?php 
include('../myConnection.php');
$db=mysqli_connect('localhost','root','','webpage');

$result = mysqli_query($db, "select * from sales_report order by id DESC");


      $queryTotal="select sum(total) as 'OverallTotal' from sales_report";
$totalResult=mysqli_query($db, $queryTotal);
$overallTotal = mysqli_fetch_assoc($totalResult);

      $queryQty="select sum(qty) as 'totalQty' from sales_report";
$qtyResult1=mysqli_query($db, $queryQty);
$totalQty = mysqli_fetch_assoc($qtyResult1);

      $queryTotal2="select sum(selling_price) as 'totalPrice' from sales_report";
$totalResult2=mysqli_query($db, $queryTotal2);
$totalPrice = mysqli_fetch_assoc($totalResult2);
?>