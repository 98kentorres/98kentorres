<?php include('configSuppliers.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/suppliers.css">
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
    <p class="dboard-text"><img class="dboard-img"src="img/black-writing.png"><b>Dashboard</b> / <i class="lets">Suppliers</i></p>
        </div>
    <br>
    <div class="box-tbl">
	<form method="post" action="">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
<button type="submit" id="Suppliers" class="btn btn-primary" name="update">UPDATE</button>
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
				            <th class="th-css">COMPANY</th>
                    <th class="th-css">CONTACT NAME</th>
                    <th class="th-css">CONTACT NO.</th>
                    <th class="th-css">ADDRESS</th>
                    <th class="th-css">NOTE</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr><?php if($row['id'] == $_GET['edit']){?>
                  <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                  <td><input type="text" class="td-input" name="company" value="<?php echo $company; ?>"></td>
                  <td><input type="text" class="td-input" name="contact_name" value="<?php echo $contact_name; ?>"></td>
                  <td><input type="text" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="contact_number" value="<?php echo $contact_number; ?>"></td>
                  <td><input type="text" class="td-input" name="address" value="<?php echo $address; ?>"></td>
                  <td><input type="text" class="td-input" name="note" value="<?php echo $note; ?>"></td>
                <?php }else{ ?>
                <td><?php echo $row['company']?></td>
                          <td><?php echo $row['contact_name']?></td>
                          <td><?php echo $row['contact_number']?></td>
                          <td><?php echo $row['address']?></td>
                          <td><?php echo $row['note']?></td>
                        <?php } ?>
					<td class="dl">
                        <a class="btn btn-edit" href="products.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a class="btn btn-delete" href="suppliers.php">CANCEL</a>
                    </td>
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
    <p class="dboard-text"><img class="dboard-img"src="img/black-writing.png"><b>Dashboard</b> / <i class="lets">Suppliers</i></p>
        </div>
    <br>
    <div class="box-tbl">
	<form method="post" action="">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
<button type="submit" id="Suppliers" class="btn btn-primary" name="update">UPDATE</button>
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
				            <th class="th-css">COMPANY</th>
                    <th class="th-css">CONTACT NAME</th>
                    <th class="th-css">CONTACT NO.</th>
                    <th class="th-css">ADDRESS</th>
                    <th class="th-css">NOTE</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr><?php if($row['id'] == $_GET['edit']){?>
                  <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                  <td><input type="text" class="td-input" name="company" value="<?php echo $company; ?>"></td>
                  <td><input type="text" class="td-input" name="contact_name" value="<?php echo $contact_name; ?>"></td>
                  <td><input type="text" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="td-input" name="contact_number" value="<?php echo $contact_number; ?>"></td>
                  <td><input type="text" class="td-input" name="address" value="<?php echo $address; ?>"></td>
                  <td><input type="text" class="td-input" name="note" value="<?php echo $note; ?>"></td>
                <?php }else{ ?>
                <td><?php echo $row['company']?></td>
                          <td><?php echo $row['contact_name']?></td>
                          <td><?php echo $row['contact_number']?></td>
                          <td><?php echo $row['address']?></td>
                          <td><?php echo $row['note']?></td>
                        <?php } ?>
					<td class="dl">
                        <a class="btn btn-edit" href="products.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a class="btn btn-delete" href="suppliers.php">CANCEL</a>
                    </td>
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
