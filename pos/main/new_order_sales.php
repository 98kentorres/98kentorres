<?php include('includes/newOrderLink.php');
        include('configProducts.php');

$db = mysqli_connect("localhost", "root","","webpage");

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$exp_dt = 'EXPIRED PRODUCT';
	$record = mysqli_query($db, "SELECT * FROM products where id=$id");

	if(@count($record) == 1 ){
			$n = mysqli_fetch_array($record);
            $id = $n['id'];
            $item_code = $n['item_code'];
			$item_name = $n['item_name'];
			$category = $n['category'];
			$supplier = $n['supplier'];
			$order_date = $n['date_recieved'];
			$expiration_date = $n['expiration_date'];
			$selling_price = $n['selling_price'];
			$qty = $n['qty'];
            $total = $n['selling_price'] * $n['qty'];
		}
}


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
        if ($expiration_date == "EXPIRED PRODUCT")
        {
            $_SESSION['message']="THIS PRODUCT IS EXPIRED";
        }
        else if($qty == 0){
            $_SESSION['message']="CURRENTLY OUT OF STOCKS";
        }
        else{
    $query1 = "update products set qty = qty - $qty where id = $id";
    $result1 = mysqli_query($db,$query1);

    $query2 = "insert into order_product (customer_name,cash,note,item_code, item_name, category, supplier, order_date, expiration_date, selling_price,qty,total,sukli)
	VALUES ('$customer_name','$cash','$note','$item_code','$item_name','$category','$supplier','$order_date','$expiration_date','$selling_price','$qty','$total','$change')";
    $result2 = mysqli_query($db,$query2);

    $query3 = "insert into sales_report (item_code, item_name, customer_name, category, date,selling_price,qty,total)
    VALUES('$item_code', '$item_name', '$customer_name', '$category', '$order_date', '$selling_price', '$qty', '$total')";
    $result3 = mysqli_query($db, $query3);

    $query4 = "insert into receipt (item_code, item_name, customer_name, date,selling_price,qty,cash)
    VALUES('$item_code', '$item_name', '$customer_name', '$order_date', '$selling_price', '$qty','$cash')";
    $result4 = mysqli_query($db, $query4);

    $query5 = "insert into logs (activity,date) VALUES ('SALES REPORT: Customer: $customer_name |Item: $item_name | Qty: $qty | HANDLED BY: $user ','$date')";
    $result5 = mysqli_query($db, $query5);
    header('location: receipt.php');


}
        }



?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME: <?php echo $user;?></title>
     <link rel="stylesheet" href="css/sales.css">
    <script type="text/javascript" src="js/myScript.js"></script>
</head>

<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
</header>
<body>
  <?php
$position=$_SESSION['SESS_ROLE'];
if($position=='CASHIER') {
?>
    <div class="box-tbl">

        <?php

			if(isset($_SESSION['message'])): ?>
			<div class = "error-msg">
			<?php
			echo $_SESSION['message'];
            unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?>
	<form method="post" action="">

                     <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
                    <?php $query = "select customer_name as `name` from receipt";
                          $result = mysqli_query($db, $query);
                          $name = mysqli_fetch_array($result);
                    ?>
                    <td> <input type="hidden" name="customer_name" value="<?php echo $name['name']; ?>" class="myinput"></td>
                    <td><input type="hidden" name="cash" value="<?php echo $cash; ?>" class="myinput"></td>
                    <td><input type="hidden" name="note" value="<?php echo $note; ?>" class="myinput"></td>

        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">ITEM CODE</th>
				<th class="th-css">ITEM NAME</th>
                <th class="th-css">CATEGORY</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td> <input type="text" name="item_code" value="<?php echo $item_code; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="item_name" value="<?php echo $item_name; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="category" value="<?php echo $category; ?>" class="myinput" title="READ ONLY" readonly></td>
                </tr>
        </table>
        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">SUPPLIER</th>
				<th class="th-css">DATE OF ORDER</th>
                <th class="th-css">EXPIRY DATE</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td> <input type="text" name="supplier" value="<?php echo $supplier; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="order_date" value="<?php echo $order_date; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="expiration_date" value="<?php echo $expiration_date; ?>" class="myinput" title="READ ONLY" readonly></td>
                </tr>
        </table>
        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">PRICE</th>
				<th class="th-css">QTY</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td><input type="text" name="selling_price" value="<?php echo $selling_price; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="qty" value="<?php echo $qty; ?>" class="myinput qtyyy" max="<?php echo $qty;?>"></td>
                </tr>
        </table>
        <br>

		<button type="submit" class="btn btn-success sub" name="save">SAVE</button>
        <button type="button" id="cal"class="btn btn-success" data-toggle="modal" data-target="#myModal" value="CALCULATE" onclick="calcSum();">CHECK TOTAL</button>
        <a href="new_order.php"><button type="button" class="btn btn-info rtn">BACK</button></a>
        </form>

        <form method="post" action="">
         <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="popup-bg">
          <h4 class="modal-title h4">TOTAL</h4>
        </div>
        <div class="modal-body">
            <label>PRICE:</label>
		 <input type="text" name="pricee" value="" class="myinput boxx pr" max=""required />
            <br><br>
            <label>QTY:</label>
		 <input type="text" name="quantity" value="" class="myinput boxx qty" max=""required />
		<br><br>
             <label>CASH:</label>
		 <input type="text" name="cash2" value="" class="myinput boxx cash2" max=""required>
            <br><br>
            <label>TOTAL:</label>
            <input type="text" id="total" name="total" value="" class="myinput boxx" readonly>
		<br><br>
            <label>BALANCE:</label>
		 <input type="text" name="balance" value="" class="myinput boxx bal" max=""required>
		<br><br>
            <label>CHANGE:</label>
		 <input type="text" name="change" value="" class="myinput boxx" max=""required>
		<br><br>
        </div>
		<br><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
      </div>

    </div>
  </div>

        </form>
        <br>
    </div>
     <?php
  }
  else if($position=='ADMINISTRATOR') { ?>
    <div class="box-tbl">

        <?php

			if(isset($_SESSION['message'])): ?>
			<div class = "error-msg">
			<?php
			echo $_SESSION['message'];
            unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?>
	<form method="post" action="">

                     <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
                    <?php $query = "select customer_name as `name` from receipt";
                          $result = mysqli_query($db, $query);
                          $name = mysqli_fetch_array($result);
                    ?>
                    <td> <input type="hidden" name="customer_name" value="<?php echo $name['name']; ?>" class="myinput"></td>
                    <td><input type="hidden" name="cash" value="<?php echo $cash; ?>" class="myinput"></td>
                    <td><input type="hidden" name="note" value="<?php echo $note; ?>" class="myinput"></td>

        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">ITEM CODE</th>
				<th class="th-css">ITEM NAME</th>
                <th class="th-css">CATEGORY</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td> <input type="text" name="item_code" value="<?php echo $item_code; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="item_name" value="<?php echo $item_name; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="category" value="<?php echo $category; ?>" class="myinput" title="READ ONLY" readonly></td>
                </tr>
        </table>
        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">SUPPLIER</th>
				<th class="th-css">DATE OF ORDER</th>
                <th class="th-css">EXPIRY DATE</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td> <input type="text" name="supplier" value="<?php echo $supplier; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="order_date" value="<?php echo $order_date; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="text" name="expiration_date" value="<?php echo $expiration_date; ?>" class="myinput" title="READ ONLY" readonly></td>
                </tr>
        </table>
        <br>
         <table>
            <thead>
				<tr>
                <th class="th-css">PRICE</th>
				<th class="th-css">QTY</th>
			</tr>
		</thead>
			<tbody>
                <tr>
                    <td><input type="text" name="selling_price" value="<?php echo $selling_price; ?>" class="myinput" title="READ ONLY" readonly></td>
                    <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="qty" value="<?php echo $qty; ?>" class="myinput qtyyy" max="<?php echo $qty;?>"></td>
                </tr>
        </table>
        <br>

		<button type="submit" class="btn btn-primary sub" name="save">PROCEED</button>
        <button type="button" id="cal"class="btn btn-success" data-toggle="modal" data-target="#myModal" value="CALCULATE" onclick="calcSum();">CHECK TOTAL</button>
        <a href="new_order.php"><button type="button" class="btn btn-info" style="width: 8%;">BACK</button></a>
        </form>

        <form method="post" action="">
         <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="popup-bg">
          <h4 class="modal-title h4">TOTAL</h4>
        </div>
        <div class="modal-body">
            <label>PRICE:</label>
		 <input type="text" name="pricee" value="" class="myinput boxx pr" max=""required />
            <br><br>
            <label>QTY:</label>
		 <input type="text" name="quantity" value="" class="myinput boxx qty" max=""required />
		<br><br>
             <label>CASH:</label>
		 <input type="text" name="cash2" value="" class="myinput boxx cash2" max=""required>
            <br><br>
            <label>TOTAL:</label>
            <input type="text" id="total" name="total" value="" class="myinput boxx" readonly>
		<br><br>
            <label>BALANCE:</label>
		 <input type="text" name="balance" value="" class="myinput boxx bal" max=""required>
		<br><br>
            <label>CHANGE:</label>
		 <input type="text" name="change" value="" class="myinput boxx" max=""required>
		<br><br>
        </div>
		<br><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
      </div>

    </div>
  </div>

        </form>
        <br>
    </div>
   <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
</body>
</html>
