<?php
        include('../myConnection.php');
        $user = $_SESSION['SESS_NAME'];
$customer_name = "";
$cash ="";
$note = "";
$item_code = "";
$item_name = "";
$category = "";
$supplier = "";
$date_recieved = "";
$order_date = date('Y-m-d');
$expiration_date = "";
$exp_dt = "EXPIRED PRODUCT";
$selling_price = "";
$qty = "";
$msg = "";
$qtyy= 0;
$total = "";
$change ="";
$id = "";
$search = "";
$req="";
$date = date('h:i A | l | Y-m-d');

$db=mysqli_connect('localhost','root','','webpage');





if(isset($_POST['add'])){
    $item_code = $_POST['item_code'];
	$item_name = $_POST['item_name'];
	$category = $_POST['category'];
	$supplier = $_POST['supplier'];
	$order_date = $_POST['date_recieved'];
	$expiration_date = $_POST['expiration_date'];
	$selling_price = $_POST['selling_price'];
	$qty = $_POST['qty'];
	$date = date('h:i A | l | Y-m-d');
     $query1 = "select * from products where item_code = '$item_code'";
    $result1 = mysqli_query($db, $query1);
    $execute1 = mysqli_num_rows($result1);

    $query2 = "select * from products where item_name = '$item_name'";
    $result2 = mysqli_query($db, $query2);
    $execute2 = mysqli_num_rows($result2);

    if($execute1 > 0){
        $_SESSION['message'] = "THE ITEM CODE ALREADY EXIST IN DATABASE";

    }
    else if($execute2 > 0){
        $_SESSION['message'] = "THE ITEM NAME ALREADY EXIST IN DATABASE";
    }
    else if($category == "CATEGORY"){
        $_SESSION['message'] = "YOU CAN'T ADD A PRODUCT WITHOUT SELECTING A CATEGORY";
    }
    else if($supplier == "SUPPLIERS"){
        $_SESSION['message'] = "YOU CAN'T ADD A PRODUCT WITHOUT SELECTING SUPPLIERS' NAME";
    }
    else{

	if($expiration_date <= $order_date){

		mysqli_query($db, "insert into logs (activity, date) values ('$user | ADDED A NEW PRODUCT: $item_name','$date')");

		mysqli_query($db, "insert into products (item_code, item_name, category, supplier, date_recieved, expiration_date, selling_price,qty)
	VALUES ('$item_code','$item_name','$category','$supplier','$order_date','$exp_dt','$selling_price','$qty')");
	$_SESSION['message'] = "SUCCESSFULLY ADDED";
	header('location: products.php');
	}
	else{

	mysqli_query($db, "insert into logs (activity, date) values ('$user | ADDED A NEW PRODUCT: $item_name','$date')");

	mysqli_query($db, "insert into products (item_code, item_name, category, supplier, date_recieved, expiration_date, selling_price,qty)
	VALUES ('$item_code','$item_name','$category','$supplier','$order_date','$expiration_date','$selling_price','$qty')");
	$_SESSION['message'] = "SUCCESSFULLY ADDED";
	header('location: products.php');
}
}
}



$results = mysqli_query($db, "select * from products");

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$record = mysqli_query($db, "select * from products where id=$id");

	if(@count($record) == 1 ){
          $n = mysqli_fetch_array($record);
	$id = $n['id'];
    $item_code = $n['item_code'];
	$item_name = $n['item_name'];
	$category = $n['category'];
	$supplier = $n['supplier'];
	$date_recieved = $n['date_recieved'];
	$expiration_date = $n['expiration_date'];
	$selling_price = $n['selling_price'];
	$qty = $n['qty'];
}
if(isset($_POST['update'])){
$id = $_POST['id'];
    $Renameitem_code = $_POST['item_code'];
	$Renameitem_name = $_POST['item_name'];
	$Renamecategory = $_POST['category'];
	$Renamesupplier = $_POST['supplier'];
	$Renamedate_recieved = $_POST['date_recieved'];
	$Renameexpiration_date = $_POST['expiration_date'];
	$Renameselling_price = $_POST['selling_price'];
	$Renameqty = $_POST['qty'];
    $date = date('h:i A | l | Y-m-d');
	mysqli_query($db, "insert into logs (activity,date) VALUES ('$item_code--$item_name--$category--$supplier--$date_recieved--$expiration_date--$selling_price--$qty :: HAS BEEN CHANGED TO ::
	$Renameitem_code--$Renameitem_name--$Renamecategory--$Renamesupplier--$Renamedate_recieved--$Renameexpiration_date--$Renameselling_price--$Renameqty | BY: $user','$date')");

    mysqli_query($db, "update products set item_code='$Renameitem_code', item_name='$Renameitem_name', category='$Renamecategory', supplier='$Renamesupplier', date_recieved='$Renamedate_recieved',
	expiration_date='$Renameexpiration_date', selling_price='$Renameselling_price', qty='$Renameqty' where id=$id");
    header('location: products.php');
}
}


if(isset($_GET['delete'])){
	           $id = $_GET['delete'];
	           $record = mysqli_query($db, "SELECT * FROM products where id=$id");
			   $date = date('h:i A | l | Y-m-d');
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $item_code = $n['item_code'];
                    $item_name = $n['item_name'];
		}

		mysqli_query($db, "insert into logs (activity,date) VALUES ('$user | DELETED A ($item_name) PRODUCT','$date')");

		mysqli_query($db, "DELETE FROM products where id=$id");
		$_SESSION['message'] = "Selected product Deleted!!!";
		header('location: products.php');
	}


  if(isset($_POST['request'])){
      $req = $_POST['req'];

          mysqli_query($db, "insert into notifs (notes,requested_by,date) VALUES ('$req','$user','$created_date')");
          header('location: products.php');
          $_SESSION['message']="YOUR REQUEST HAS BEEN SENT";
      }

if(isset($_POST['SearchProduct']))
{
    $SearchProduct = $_POST['SearchProduct'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `products` WHERE CONCAT(`item_name`) LIKE '%".$SearchProduct."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `products`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "webpage");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
	//order

$query = "select * from products order by id desc limit 1";
$resultt = mysqli_query($db, $query);
$row = mysqli_fetch_array($resultt);
$new_id = $row['id'];
if($new_id == ""){
    $itemcode = "OB-0001";
}else{
    $itemcode = substr($new_id,1);
    $itemcode = intval($new_id);
    $itemcode = "OB-000".($itemcode + 1);
}
?>
