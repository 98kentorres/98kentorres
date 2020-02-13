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

  <ul>
  <li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
  <li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
  <li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
  <li><a href="customers.php"><img src="img/users.png" style="margin-right: 10%;">Customers</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
     <br><br><br>
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
        <input type="text" name="item_code" value="<?php echo $item_code; ?>" placeholder="ITEM CODE" class="boxx" required>
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
		<input type="text" name="date_recieved" value="<?php echo $order_date; ?>" placeholder="DATE RECIEVED" class="boxx" id="dt" readonly>
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
	<form method="post" action="">
    <?php $qty = ""; ?>
<select name="add_to_cart" class="src_bar">
<?php while($row = mysqli_fetch_array($search_result)):?>
  <option value="<?php echo $row['item_code'], $row['item_name'], $row['category'], $row['supplier']; ?>">
    <?php echo $row['item_code']; ?>
    <?php echo $row['item_name']; ?>
    <?php echo $row['category']; ?>
    <?php echo $row['supplier']; ?>
    <?php echo $row['selling_price']; ?>
  </option>
  <?php if(isset($_POST['addings'])){
    $item_code = $row['item_code'];
    $item_name = $row['item_name'];
    $category = $row['category'];
    $supplier = $row['supplier'];
    $qty = $_POST['qty'];
    $selling_price = $row['selling_price'];
     if($row['id'] == $_POST['add_to_cart']){
    mysqli_query($db, "INSERT INTO logs (activity,date) VALUES ('$item_code | $item_name | $category | $supplier | $selling_price','$date')");
    mysqli_query($db, "INSERT INTO dummy (item_code,item_name,category,qty) VALUES ('$item_code','$item_name','$category','$qty')");
    header('location: print_receipt.php');
  }
  }?>
<?php endwhile; ?>
</select>
<input type="text" name="qty" value="<?php echo $qty?>">;
<button type="submit" class="btn btn-primary" name="addings">ADD</button>
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
				<th class="th-css">QTY</th>
				<th class="th-css">TOTAL</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
        <tr>
          <?php $query = "select * from dummy";
                $result = mysqli_query($db,$query);
          while($row = mysqli_fetch_array($result)):?>
          <td><?php echo $row['item_code']; ?></td>
          <td><?php echo $row['item_name']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <?php endwhile; ?>
        </tr>
			     </tbody>
	           </table>
			   <br>
    <div class="center-numbers">
				<button type="button" id="std" class="btn btn-success" data-toggle="modal" data-target="#myModal">ADD NEW PRODUCT</button>
                    </div>
            </form>
		</div>
  </body>
  </html>
