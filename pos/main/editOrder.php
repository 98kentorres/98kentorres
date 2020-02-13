<?php include('configNewOrder.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');

	   if(isset($_POST['delete'])){
		mysqli_query($db, "DELETE FROM receipt");
		header('location: products.php');
	}
if(isset($_POST['Search']))
{
    $SearchProduct = $_POST['Search'];
    // search in all table columns
    // using concat mysql function
    $queryy = "SELECT * FROM `products` WHERE CONCAT(`item_name`, `category`) LIKE '%".$SearchProduct."%'";
    $search_resultt = filterTable($queryy);

}
 else {
    $queryy = "SELECT * FROM `products`";
    $search_resultt = filterTable($queryy);
}

// function to connect and execute the query
function filterTable($queryy)
{
    $connectt = mysqli_connect("localhost", "root", "", "webpage");
    $filter_Result = mysqli_query($connectt, $queryy);
    return $filter_Result;
}
if(isset($_GET['edit'])){
	           $id = $_GET['edit'];
	           $record = mysqli_query($db, "SELECT * FROM products where id=$id");

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
    <link rel="stylesheet" type="text/css" href="css/editOrder.css">
</head>

<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
</header>
<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='CASHIER') {
  ?>
  <ul>
  <li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
  <li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
  <li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
  <li><a href="customers.php"><img src="img/users.png" style="margin-right: 10%;">Customers</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br><br>
    <header>
        <div class="container">
  <div class="input-box">
		<?php
      include('../myConnection.php');
		$query2 = "select * from products";
        $rs2 = mysqli_query($db,$query2);
        $total = mysqli_num_rows($rs2);
		?>
      <h3 id="std_text"><i><b>TOTAL PRODUCTS [<?php echo $total;?>]</b></i></h3>
	</div>
	<div class="input-boxx">
		<?php
        include('../myConnection.php');
		$query3 = "select * from receipt";
        $rs3 = mysqli_query($db,$query3);
        $exp_total = mysqli_num_rows($rs3);

		?>
      <h3 id="std_text"><i><b>ORDERED PRODUCTS [<?php echo $exp_total;?>]</b></i></h3>
	</div>
    <br>
</div>
    </header>
<div class="box-tbl">
	<form method="post" action="new_order.php">
<input type="text" class="src_bar" name="Search"placeholder="Search Products...">

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
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_resultt)):?>
                <tr>
                  <?php if($row['id'] == $_GET['edit']) {?>
                    <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" class="td-input" name="item_code" value="<?php echo $row['item_code']; ?>">
                    <input type="hidden" class="td-input" name="item_name" value="<?php echo $row['item_name']; ?>">
                    <input type="hidden" class="td-input" name="category" value="<?php echo $row['category']; ?>">
                    <input type="hidden" class="td-input" name="supplier" value="<?php echo $row['supplier']; ?>">
                    <input type="hidden" class="td-input" name="date_recieved" value="<?php echo $row['date_recieved']; ?>">
                    <input type="hidden" class="td-input" name="expiration_date" value="<?php echo $row['expiration_date']; ?>">
                    <input type="hidden" class="td-input" name="selling_price" value="<?php echo $row['selling_price']; ?>">
                    <td><?php echo $row['item_code']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['supplier']; ?></td>
                    <td><?php echo $row['date_recieved']; ?></td>
                    <td><?php echo $row['expiration_date']; ?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
                    <td>
                        <?php if($row['qty'] == 0){ ?>
                        <input type="text" class="td-input" name="qty" value="OUT OF STOCK" readonly>
                        <?php } else { ?>
                        <input type="text" class="td-input" name="qty" value="<?php echo $qty; ?>" max="<?php $row['qty'];?>">
                    </td>
                    <?php } ?>
                  <?php } else { ?>
          <td class="td"><?php echo $row['item_code']; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['supplier']; ?></td>
					<td><?php echo $row['date_recieved']; ?></td>
					<td><?php echo $row['expiration_date']; ?></td>
					<td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } } ?>

					<td>
					<a class="btn-check" href="editOrder.php?edit=<?php echo $row['id']; ?>">ORDER</a>
          <a class="btn-edit" href="receipt.php?add=<?php echo $row['id']; ?>">ADD</a>
					</td>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
			   <br>
    <div class="center-numbers">
                <a href="products.php" class="btn btn-danger">CANCEL</a>
        <button type="button" style="width: 10%;"id="cal"class="btn btn-success" data-toggle="modal" data-target="#myModal" value="CALCULATE" onclick="calcSum();">CHECK TOTAL</button>
        <button type="submit" class="btn btn-primary sub" name="save">PROCEED</button>
                    </div>
            </form>
		</div>

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
  <?php
  }
  else if($position=='ADMINISTRATOR') {
  ?>
  <ul>
  <li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
  <li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
   <li><a href="sales_report.php"><img src="img/sales.png" style="margin-right: 10%;">Sales Report</a></li>
  <li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
  <li><a href="customers.php"><img src="img/users.png" style="margin-right: 10%;">Customers</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="accounts.php"><img src="img/management.png" style="margin-right: 10%;">Accounts</a></li>
  <li><a href="logs.php"><img src="img/logs.png" style="margin-right: 10%;">Logs</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br><br>
    <header>
        <div class="container">
  <div class="input-box">
		<?php
      include('../myConnection.php');
		$query2 = "select * from products";
        $rs2 = mysqli_query($db,$query2);
        $total = mysqli_num_rows($rs2);
		?>
      <h3 id="std_text"><i><b>TOTAL PRODUCTS [<?php echo $total;?>]</b></i></h3>
	</div>
	<div class="input-boxx">
		<?php
        include('../myConnection.php');
		$query3 = "select * from receipt";
        $rs3 = mysqli_query($db,$query3);
        $exp_total = mysqli_num_rows($rs3);

		?>
      <h3 id="std_text"><i><b>ORDERED PRODUCTS [<?php echo $exp_total;?>]</b></i></h3>
	</div>
    <br>
</div>
    </header>
<div class="box-tbl">
	<form method="post" action="new_order.php">
<input type="text" class="src_bar" name="Search"placeholder="Search Products...">

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
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_resultt)):?>
                <tr>
                  <?php if($row['id'] == $_GET['edit']) {?>
                    <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" class="td-input" name="item_code" value="<?php echo $row['item_code']; ?>">
                    <input type="hidden" class="td-input" name="item_name" value="<?php echo $row['item_name']; ?>">
                    <input type="hidden" class="td-input" name="category" value="<?php echo $row['category']; ?>">
                    <input type="hidden" class="td-input" name="supplier" value="<?php echo $row['supplier']; ?>">
                    <input type="hidden" class="td-input" name="date_recieved" value="<?php echo $row['date_recieved']; ?>">
                    <input type="hidden" class="td-input" name="expiration_date" value="<?php echo $row['expiration_date']; ?>">
                    <input type="hidden" class="td-input" name="selling_price" value="<?php echo $row['selling_price']; ?>">
                    <td><?php echo $row['item_code']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['supplier']; ?></td>
                    <td><?php echo $row['date_recieved']; ?></td>
                    <td><?php echo $row['expiration_date']; ?></td>
                    <td><?php echo number_format($row['selling_price']); ?></td>
                    <td>
                        <?php if($row['qty'] == 0){ ?>
                        <input type="text" class="td-input" name="qty" value="OUT OF STOCK" readonly>
                        <?php } else { ?>
                        <input type="text" class="td-input" name="qty" value="<?php echo $qty; ?>" max="<?php $row['qty'];?>">
                    </td>
                    <?php } ?>
                  <?php } else { ?>
          <td class="td"><?php echo $row['item_code']; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['supplier']; ?></td>
					<td><?php echo $row['date_recieved']; ?></td>
					<td><?php echo $row['expiration_date']; ?></td>
					<td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "OUT OF STOCK";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } } ?>

					<td>
					<a class="btn-check" href="editOrder.php?edit=<?php echo $row['id']; ?>">ORDER</a>
          <a class="btn-edit" href="receipt.php?add=<?php echo $row['id']; ?>">ADD</a>
					</td>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
			   <br>
    <div class="center-numbers">
                <a href="products.php" class="btn btn-danger">CANCEL</a>
        <button type="button" style="width: 10%;"id="cal"class="btn btn-success" data-toggle="modal" data-target="#myModal" value="CALCULATE" onclick="calcSum();">CHECK TOTAL</button>
        <button type="submit" class="btn btn-primary sub" name="save">PROCEED</button>
                    </div>
            </form>
		</div>

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
    <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
</body>
</html>
