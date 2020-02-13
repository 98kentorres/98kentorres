<?php
include('../myConnection.php');
$id = "";
$customer_name= "";
$cash= "";
$note= "";
$item_code= "";
$item_name= "";
$category= "";
$supplier= "";
$order_date= "";
$expiration_date= "";
$selling_price= "";
$qty= "";
$total= "";
$change= "";

$db = mysqli_connect("localhost","root","","webpage");
if(isset($_POST['save'])){
        $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $cash = $_POST['cash'];
    $note = $_POST['note'];
    $item_code = $_POST['item_code'];
	$item_name = $_POST['item_name'];
	$category = $_POST['category'];
	$supplier = $_POST['supplier'];
	$order_date = $_POST['order_date'];
	$expiration_date = $_POST['expiration_date'];
	$selling_price = $_POST['selling_price'];
	$qty = $_POST['qty'];
    $total = $_POST['selling_price'] * $_POST['qty'];
    $change =$_POST['cash'] - $_POST['selling_price'] * $_POST['qty'];
         if(empty($_POST['customer_name'])){
             $_SESSION['message']="CUSTOMER NAME CANNOT BE EMPTY!";
        }
        else if(empty($_POST['cash'])){
             $_SESSION['message']="CASH FIELD CANNOT BE EMPTY!";
        }
        else if ($cash < $total)
        {
            $_SESSION['message']="THE CASH ISN'T ENOUGH TO GET THE ORDER!!!";
        }
        else if ($expiration_date == "EXPIRED PRODUCT")
        {
            $_SESSION['message']="THIS PRODUCT IS EXPIRED";
        }
        else if($qty == 0){
            $_SESSION['message']="CURRENTLY OUT OF STOCKS";
        }
        else{

    $query2 = "insert into order_product (customer_name,cash,note,item_code, item_name, category, supplier, order_date, expiration_date, selling_price,qty,total,sukli)
	VALUES ('$customer_name','$cash','$note','$item_code','$item_name','$category','$supplier','$order_date','$expiration_date','$selling_price','$qty','$total','$change')";
    $result2 = mysqli_query($db,$query2);

    $query3 = "insert into sales_report (item_code, item_name, customer_name, category, date,selling_price,qty,total)
    VALUES('$item_code', '$item_name', '$customer_name', '$category', '$order_date', '$selling_price', '$qty', '$total')";
    $result3 = mysqli_query($db, $query3);

    $query4 = "insert into receipt (item_code, item_name, customer_name, date,selling_price,qty,cash)
    VALUES('$item_code', '$item_name', '$customer_name', '$order_date', '$selling_price', '$qty','$cash')";
    $result4 = mysqli_query($db, $query4);
	header('location: receipt.php');


}
        }

        if(isset($_GET['add'])){
                $id = $_POST['id'];
            $customer_name = $_POST['customer_name'];
            $cash = $_POST['cash'];
            $note = $_POST['note'];
            $item_code = $_POST['item_code'];
        	   $item_name = $_POST['item_name'];
        	    $category = $_POST['category'];
        	     $supplier = $_POST['supplier'];
        	      $order_date = $_POST['order_date'];
        	       $expiration_date = $_POST['expiration_date'];
        	        $selling_price = $_POST['selling_price'];
        	         $qty = $_POST['qty'];
                   $total = $_POST['selling_price'] * $_POST['qty'];
                   $change =$_POST['cash'] - $_POST['selling_price'] * $_POST['qty'];
                 if(empty($_POST['customer_name'])){
                     $_SESSION['message']="CUSTOMER NAME CANNOT BE EMPTY!";
                }
                else if(empty($_POST['cash'])){
                     $_SESSION['message']="CASH FIELD CANNOT BE EMPTY!";
                }
                else if ($cash < $total)
                {
                    $_SESSION['message']="THE CASH ISN'T ENOUGH TO GET THE ORDER!!!";
                }
                else if ($expiration_date == "EXPIRED PRODUCT")
                {
                    $_SESSION['message']="THIS PRODUCT IS EXPIRED";
                }
                else if($qty == 0){
                    $_SESSION['message']="CURRENTLY OUT OF STOCKS";
                }
                else{

            $query2 = "insert into order_product (customer_name,cash,note,item_code, item_name, category, supplier, order_date, expiration_date, selling_price,qty,total,sukli)
        	VALUES ('$customer_name','$cash','$note','$item_code','$item_name','$category','$supplier','$order_date','$expiration_date','$selling_price','$qty','$total','$change')";
            $result2 = mysqli_query($db,$query2);

            $query3 = "insert into sales_report (item_code, item_name, customer_name, category, date,selling_price,qty,total)
            VALUES('$item_code', '$item_name', '$customer_name', '$category', '$order_date', '$selling_price', '$qty', '$total')";
            $result3 = mysqli_query($db, $query3);

            $query4 = "insert into receipt (item_code, item_name, date,selling_price,qty)
            VALUES('$item_code', '$item_name', '$order_date', '$selling_price', '$qty')";
            $result4 = mysqli_query($db, $query4);
        	header('location: receipt.php');


        }
                }
        ?>
