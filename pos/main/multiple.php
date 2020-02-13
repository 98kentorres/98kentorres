<?php 
    $db=mysqli_connect('localhost','root','','webpage');
$product="";
    if(isset($_POST['save'])){
        $product = $_POST['product'];
        mysqli_query($db,"insert into receipt (item_code,item_name,category) VALUES ('$product')");
        header('location: sales_backup.php');
    }
?>