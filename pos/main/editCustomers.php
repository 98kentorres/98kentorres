<?php
      include('configCustomers.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/customers.css">
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
  <br><br>
  <div class="dboard">
  <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">Customers</i></p>
      </div>
  <br>
  <form method="post" action="customers.php">
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
      <input type="text" name="name" value="<?php echo $name; ?>" placeholder="NAME" class="boxx" required>
      <br><br>
  <input type="text" name="address" value="<?php echo $address; ?>" placeholder="ADDRESS" class="boxx" required>
  <br><br>
  <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="CONTACT" class="boxx" required>
      <br><br>
      <input type="text" name="product_name" value="<?php echo $product_name; ?>" placeholder="PRODUCT NAME" class="boxx" required>
      <br><br>
      <input type="text" name="due_date" value="<?php echo $due_date; ?>" placeholder="DUE DATE" class="boxx" required>
      <br><br>
      <input type="text" name="note" value="<?php echo $note; ?>" placeholder="NOTE" class="boxx" required>
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

  <div class="box-tbl">
<form method="post" action="customers.php">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
      <button type="button" id="Suppliers" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD CUSTOMER</button>

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
    <?php endif ?>
    <thead>
      <tr>
          <th class="th-css">NAME</th>
                  <th class="th-css">ADDRESS</th>
                  <th class="th-css">CONTACT</th>
                  <th class="th-css">PRODUCT NAME</th>
                  <th class="th-css">DUE DATE</th>
                  <th class="th-css">NOTE</th>
      <th class="th-css" colspan="4">ACTION</th>
    </tr>
  </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($search_result)):?>
              <tr>
                <?php if($row['id'] == $_GET['edit']){ ?>
                  <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                  <td><input type="text" class="td-input" name="name" value="<?php echo $name; ?>"></td>
                  <td><input type="text" class="td-input" name="address" value="<?php echo $address; ?>"></td>
                  <td><input type="text" class="td-input" name="contact" value="<?php echo $contact; ?>"></td>
                  <td><input type="text" class="td-input" name="product_name" value="<?php echo $product_name; ?>"></td>
                  <td><input type="text" class="td-input" name="due_date" value="<?php echo $due_date; ?>"></td>
                  <td><input type="text" class="td-input" name="note" value="<?php echo $note; ?>"></td>
                <?php } else { ?>
        <td><?php echo $row['name']?></td>
                  <td><?php echo $row['address']?></td>
                  <td><?php echo $row['contact']?></td>
                  <td><?php echo $row['product_name']?></td>
                  <td><?php echo $row['due_date']?></td>
                  <td><?php echo $row['note']?></td>
                <?php } ?>
                <td><a class="btn btn-edit" href="editCustomers.php?edit=<?php echo $row['id']; ?>">EDIT</a></td>
                  <td><a class="btn btn-delete" href="customers.php?delete=<?php echo $row['id']; ?>">DELETE</a></td>
              </tr>
              <?php endwhile;?>
         </tbody>
           </table>
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
  <li><a href="customers.php"><img src="img/users.png" style="margin-right: 10%;">Customers</a></li>
  <li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
  <li><a href="accounts.php"><img src="img/management.png" style="margin-right: 10%;">Accounts</a></li>
  <li><a href="logs.php"><img src="img/logs.png" style="margin-right: 10%;">Logs</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br>
    <div class="dboard">
    <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">Customers</i></p>
        </div>
    <br>
    <form method="post" action="customers.php">
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
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="NAME" class="boxx" required>
        <br><br>
		<input type="text" name="address" value="<?php echo $address; ?>" placeholder="ADDRESS" class="boxx" required>
		<br><br>
		<input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="CONTACT" class="boxx" required>
        <br><br>
        <input type="text" name="product_name" value="<?php echo $product_name; ?>" placeholder="PRODUCT NAME" class="boxx" required>
        <br><br>
        <input type="text" name="due_date" value="<?php echo $due_date; ?>" placeholder="DUE DATE" class="boxx" required>
        <br><br>
        <input type="text" name="note" value="<?php echo $note; ?>" placeholder="NOTE" class="boxx" required>
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

    <div class="box-tbl">
	<form method="post" action="customers.php">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
        <button type="button" id="Suppliers" class="btn btn-primary" name="update">UPDATE</button>

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
			<?php endif ?>
			<thead>
				<tr>
				    <th class="th-css">NAME</th>
                    <th class="th-css">ADDRESS</th>
                    <th class="th-css">CONTACT</th>
                    <th class="th-css">PRODUCT NAME</th>
                    <th class="th-css">DUE DATE</th>
                    <th class="th-css">NOTE</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                  <?php if($row['id'] == $_GET['edit']){ ?>
                    <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                    <td><input type="text" class="td-input" name="name" value="<?php echo $name; ?>"></td>
                    <td><input type="text" class="td-input" name="address" value="<?php echo $address; ?>"></td>
                    <td><input type="text" class="td-input" name="contact" value="<?php echo $contact; ?>"></td>
                    <td><input type="text" class="td-input" name="product_name" value="<?php echo $product_name; ?>"></td>
                    <td><input type="text" class="td-input" name="due_date" value="<?php echo $due_date; ?>"></td>
                    <td><input type="text" class="td-input" name="note" value="<?php echo $note; ?>"></td>
                  <?php } else { ?>
					<td><?php echo $row['name']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['contact']?></td>
                    <td><?php echo $row['product_name']?></td>
                    <td><?php echo $row['due_date']?></td>
                    <td><?php echo $row['note']?></td>
                  <?php } ?>
                  <td><a class="btn btn-edit" href="editCustomers.php?edit=<?php echo $row['id']; ?>">EDIT</a></td>
                    <td><a class="btn btn-delete" href="customers.php">CANCEL</a></td>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
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
