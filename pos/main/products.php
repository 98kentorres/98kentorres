<?php include('configProducts.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');


	   if(isset($_GET['edit'])){
	           $id = $_GET['edit'];

	           $record = mysqli_query($db, "SELECT * FROM products where id=$id");
	           if($qty == 0){
                   $_SESSION['message']="CURRENTLY NO STOCK";
               }
	           if(count($record) == 1 ){
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
}


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/products.css">
</head>

<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
</header>
<body>
  <?php
  $cashier = $_SESSION['SESS_NAME'];
  $position=$_SESSION['SESS_ROLE'];
  if($position=='CASHIER') {
  ?>
  <ul>
  <li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
  <li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
  <li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="cashierRequest.php"><img src="img/notification.png" style="margin-right: 10%;">My Request</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
  <?php $query3 = "select cashier_req from send_request where cashier_req = '$cashier'";
      $rs3 = mysqli_query($db,$query3);
      $cashierNotif = mysqli_num_rows($rs3);
  ?>
  <span class="badge1"><?php echo $cashierNotif?></span>
     <br><br>
     <div class="dboard">
     <p class="dboard-text"><img class="dboard-img"src="img/black-writing.png"><b>Dashboard</b> / <i class="lets">Products</i></p>
   </div><br><br>
        <div class="container">
  <div class="input-box">
		<?php
		$query2 = "select * from products";
        $rs2 = mysqli_query($db,$query2);
        $total = mysqli_num_rows($rs2);
		?>
      <h3 id="std_text"><i><b>TOTAL PRODUCTS [<?php echo $total;?>]</b></i></h3>
	</div>
	<div class="input-boxx">
		<?php
		$query3 = "select expiration_date from products where expiration_date <= date_recieved";
        $rs3 = mysqli_query($db,$query3);
        $exp_total = mysqli_num_rows($rs3);

		?>
      <h3 id="std_text"><i><b>EXPIRED PRODUCTS [<?php echo $exp_total;?>]</b></i></h3>
	</div>
    <br>
    <form method="post" action="">
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="popup-bg">
       <h4 class="modal-title h4">DETAILS</h4>
     </div>
     <div class="modal-body">
       <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
     <br><br>
     <label class="boxx">Leave message below...</label>
     <textarea rows="4" cols="50" class="boxx" name="req"><?php echo $req; ?></textarea>
     <input type="hidden" value="<?php echo $user; ?>" class="boxx">
     <input type="hidden" value="<?php echo $date; ?>" class="boxx">
     <br>

     </div>
  <br><br>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
        <button type="submit" name="request" id="btn" class="btn btn-primary">SEND</button>
         </div>
     </div>
   </div>
  </div>
  </div>
  </form>

</div>
    </header>
<div class="box-tbl">
	<form method="post" action="products.php">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search Products...">
<button type="button" id="Suppliers" class="btn btn-primary" data-toggle="modal" data-target="#myModal">SEND REQUEST</button>
	<table>
        <br>
	       <?php

			if(isset($_SESSION['message'])): ?>
			<div class = "error-msg">
			<?php
			echo $_SESSION['message'];
            unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?><br>
			<thead>
				<tr>
                <th class="th-css">ITEM CODE</th>
				<th class="th-css">ITEM NAME</th>
				<th class="th-css">CATEGORY</th>
				<th class="th-css">SUPPLIER</th>
				<th class="th-css">DATE RECIEVED</th>
				<th class="th-css">EXPIRATION DATE</th>
				<th class="th-css">SELLING PRICE</th>
				<th class="th-css">QTY</th>
				<th class="th-css">TOTAL</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
        <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td class="td"><?php echo $row['item_code']; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['supplier']; ?></td>
          <?php if($row['date_recieved'] >= $row['expiration_date']){ ?>
                    <td class="red-bg"><?php echo $row['expiration_date']; ?></td>
                    <td class="red-bg"><?php echo $row['date_recieved'];?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } ?>
					<td><?php echo number_format($row['selling_price'] * $row['qty']);?></td>
					<td><a class="btn-grayed" href="">ORDER</a></td>
        <?php }else { ?>
          <td><?php echo $row['date_recieved']; ?></td>
          <td><?php echo $row['expiration_date']; ?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } ?>
					<td><?php echo number_format($row['selling_price'] * $row['qty']);?></td>
					<td><a class="btn-check" href="sales.php?edit=<?php echo $row['id']; ?>">ORDER</a></td>
        <?php } ?>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
			   <br>
            </form>
		</div>
  <?php
  }
  else if($position=='ADMINISTRATOR') {
  ?>
  <ul>
  <li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
  <li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
   <li><a href="sales_report.php"><img src="img/sales.png" style="margin-right: 10%;">Sales Report</a></li>
  <li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="accounts.php"><img src="img/management.png" style="margin-right: 10%;">Accounts</a></li>
  <li><a href="requests.php"><img src="img/notification.png" style="margin-right: 10%;">Requests</a></li>
  <li><a href="logs.php"><img src="img/logs.png" style="margin-right: 10%;">Logs</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
  <?php $query3 = "select * from notifs";
      $rs3 = mysqli_query($db,$query3);
      $notification = mysqli_num_rows($rs3);
  ?>
  <span class="badge"><?php echo $notification;?></span>
    <br><br><br>
    <header>
        <div class="container">
  <div class="input-box">
		<?php
		$query2 = "select * from products";
        $rs2 = mysqli_query($db,$query2);
        $to = mysqli_num_rows($rs2);
		?>
      <h3 id="std_text"><i><b>TOTAL PRODUCTS [<?php echo $to;?>]</b></i></h3>
	</div>
	<div class="input-boxx">
		<?php
		$query3 = "select expiration_date from products where expiration_date <= date_recieved";
        $rs3 = mysqli_query($db,$query3);
        $exp_total = mysqli_num_rows($rs3);
		?>
      <h3 id="std_text"><i><b>EXPIRED PRODUCTS [<?php echo $exp_total;?>]</b></i></h3>
	</div>
    <br>
	<form method="post" action="">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="popup-bg">
          <h4 class="modal-title h4">ADD PRODUCT</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
		<br>
        <input type="text" name="item_code" value="<?php echo $itemcode; ?>" placeholder="ITEM CODE" class="boxx" id="item_code" readonly>
        <br><br>
			<input type="text" name="item_name" value="<?php echo $item_name; ?>" placeholder="ITEM NAME" class="boxx" required>
		<br><br>

            <?php
             $queryCategory = "SELECT * FROM categories";
		      $result=mysqli_query($db, $queryCategory);
            ?>

            <select name="category">
                <option>CATEGORY</option>
                <?php for($i=0; $row = mysqli_fetch_array($result); $i++){ ?>
            <option class="option" value="<?php echo $row['category']; ?>" ><?php echo $row['category']; ?></option>
                <?php } ?>
            </select>
		<br><br>


            <?php
             $querySupplier = "SELECT company FROM suppliers";
		      $result=mysqli_query($db, $querySupplier);
            ?>

            <select name="supplier">
                <option>SUPPLIERS</option>
                <?php for($i=0; $row = mysqli_fetch_array($result); $i++){ ?>
            <option class="option" value="<?php echo $row['company']; ?>" ><?php echo $row['company']; ?></option>
                <?php } ?>
            </select>

		<br><br>
		<input type="text" name="date_recieved" value="<?php echo $order_date; ?>" placeholder="DATE RECIEVED" class="boxx date_rec" id="dt" readonly>
		<br><br>
		<input type="date" name="expiration_date" value="<?php echo $expiration_date; ?>" placeholder="EXPIRATION DATE" class="boxx" id="dt" required>
		<br><br>
		<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="selling_price" value="<?php echo $selling_price; ?>" placeholder="SELLING PRICE" class="boxx" required>
        <br><br>
		<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="qty" value="<?php echo $qty; ?>" placeholder="QUANTITY" class="boxx" required>
		<br><br>
        </div>
		<br><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            <button type="submit" name="add" id="btn" class="btn btn-success">ADD</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  </form>

</div>
    </header>
<div class="box-tbl">
	<form method="post" action="products.php">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search Products...">

	<table>
        <br>
	       <?php

			if(isset($_SESSION['message'])): ?>
			<div class = "error-msg">
			<?php
			echo $_SESSION['message'];
            unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?><br>
			<thead>
				<tr>
                <th class="th-css">ITEM CODE</th>
				<th class="th-css">ITEM NAME</th>
				<th class="th-css">CATEGORY</th>
				<th class="th-css">SUPPLIER</th>
				<th class="th-css">DATE RECIEVED</th>
				<th class="th-css">EXPIRATION DATE</th>
				<th class="th-css">SELLING PRICE</th>
				<th class="th-css">QTY</th>
				<th class="th-css">TOTAL</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td class="td"><?php echo $row['item_code']; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['supplier']; ?></td>
          <?php if($row['date_recieved'] >= $row['expiration_date']){ ?>
                    <td class="red-bg"><?php echo $row['expiration_date']; ?></td>
                    <td class="red-bg"><?php echo $row['date_recieved'];?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } ?>
					<td><?php echo number_format($row['selling_price'] * $row['qty']);?></td>
					<td><a class="btn-edit" href="edit.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a class="btn-grayed">ORDER</a>
					<a class="btn-delete" href="products.php?delete=<?php echo $row['id']; ?>">DELETE</a></td>
        <?php }else { ?>
          <td><?php echo $row['date_recieved']; ?></td>
          <td><?php echo $row['expiration_date']; ?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } ?>
					<td><?php echo number_format($row['selling_price'] * $row['qty']);?></td>
					<td><a class="btn-edit" href="edit.php?edit=<?php echo $row['id']; ?>">EDIT</a>
					<a class="btn-check" href="sales.php?edit=<?php echo $row['id']; ?>">ORDER</a>
					<a class="btn-delete" href="products.php?delete=<?php echo $row['id']; ?>">DELETE</a></td>
        <?php } ?>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
			   <br>
    <div class="center-numbers">
				<button type="button" id="std" class="btn btn-success" data-toggle="modal" data-target="#myModal">ADD NEW PRODUCT</button>
                    </div>
            </form>
		</div>
    <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
</body>
</html>
