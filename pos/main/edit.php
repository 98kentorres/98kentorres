<?php include('configProducts.php');
        include('includes/linkScript.php');
        $query = "SELECT * FROM categories";
		$result=mysqli_query($db, $query);
        $query2 = "SELECT company FROM suppliers";
		$result2=mysqli_query($db, $query2);

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/products.css">
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
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br><br>
    <header>
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

</div>
    </header>
<div class="box-tbl">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search Products..." readonly>

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
        <form method="post" action="edit.php">
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
              <?php if ($row['id'] == $_GET['edit']){ ?>
                <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                  <td><input type="text" class="readOnly" name="item_code" value="<?php echo $item_code; ?>" readonly></td>
                    <td><input type="text" class="td-input" name="item_name" value="<?php echo $item_name; ?>"></td>
                      <td><select name="category">
                      <?php while($row = mysqli_fetch_array($result)):?>
                    <option value="<?php echo $row['category']; ?>" ><?php echo $row['category']; ?></option>
                  <?php endwhile; ?>
                </select></td>
             <td><select name="supplier">
                      <?php while($row = mysqli_fetch_array($result2)):?>
                    <option value="<?php echo $row['company']; ?>" ><?php echo $row['company']; ?></option>
                  <?php endwhile; ?>
                </select></td>
                <td><input type="date" class="readOnly" name="date_recieved" value="<?php echo $date_recieved; ?>" readonly></td>
                  <td><input type="date" class="td-input" name="expiration_date" value="<?php echo $expiration_date; ?>"></td>
                    <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="selling_price" value="<?php echo $selling_price; ?>"></td>
                      <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="qty" value="<?php echo $qty; ?>"></td>
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
                                                echo "0";
                                              } else {
                                            echo $row['qty']; ?></td>
                                        <?php  } } ?>
					                           <td><a class="btn-edit" href="edit.php?edit=<?php echo $row['id']; ?>">EDIT</a></td>
					<td><a class="btn-delete" href="products.php">CANCEL</a></td>
                </tr>
                <?php endwhile; ?>
			     </tbody>
	           </table>
			   <br>
     <div class="center-numbers">
         <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                    </div>
		</form>
        </div>
    <br>
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
  <li><a href="requests.php"><img src="img/notification.png" style="margin-right: 10%;">Requests<span class="badge">3</span></a></li>
  <li><a href="logs.php"><img src="img/logs.png" style="margin-right: 10%;">Logs</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br><br>
    <header>
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

</div>
    </header>
<div class="box-tbl">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search Products..." readonly>

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
        <form method="post" action="">
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
              <?php if ($row['id'] == $_GET['edit']){ ?>
                <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                  <td><input type="text" class="readOnly" name="item_code" value="<?php echo $item_code; ?>" readonly></td>
                    <td><input type="text" class="td-input" name="item_name" value="<?php echo $item_name; ?>"></td>
                      <td><select name="category">
                      <?php while($row = mysqli_fetch_array($result)):?>
                    <option value="<?php echo $row['category']; ?>" ><?php echo $row['category']; ?></option>
                  <?php endwhile; ?>
                </select></td>
             <td><select name="supplier">
                      <?php while($row = mysqli_fetch_array($result2)):?>
                    <option value="<?php echo $row['company']; ?>" ><?php echo $row['company']; ?></option>
                  <?php endwhile; ?>
                </select></td>
                <td><input type="text" class="readOnly" name="date_recieved" value="<?php echo $date_recieved; ?>" readonly></td>
                  <td><input type="date" class="td-input" name="expiration_date" value="<?php echo $expiration_date; ?>"></td>
                    <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="selling_price" value="<?php echo $selling_price; ?>"></td>
                      <td><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="qty" value="<?php echo $qty; ?>"></td>
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
                                              } else {
                                            echo $row['qty']; ?></td>
                                        <?php  } } ?>
					                           <td><a class="btn-edit" href="edit.php?edit=<?php echo $row['id']; ?>">EDIT</a></td>
					<td><a class="btn-delete" href="products.php">CANCEL</a></td>
                </tr>
                <?php endwhile; ?>
			     </tbody>
	           </table>
			   <br>
     <div class="center-numbers">
         <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                    </div>
		</form>
        </div>
    <br>
     <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
    </body>
</html>
