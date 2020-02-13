<?php include('configCategory.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');

$results = mysqli_query($db, "select * from categories");

$query = "SELECT fullname FROM account";
$nameResult=mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/category.css">
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
    <br><br><br><br>
    <div class="box-tbl">
	<form method="post" action="">
<input type="text" class="src_bar" placeholder="Search Category..." readonly>
         <button type="submit" id="Suppliers" class="btn btn-primary"name="update">SAVE</button>

	<table>
			<thead>
				<tr>
				<th class="th-css">CATEGORY</th>
				<th class="th-css" colspan="4">ACTION</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($results)):?>
                <tr>
                    <?php if($row['id'] == $_GET['edit']){ ?>
                    <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                    <td><input type="text" class="td-input" name="category" value="<?php echo $category; ?>"></td>
                    <td><input type="text" class="td-input"value="<?php $row['created_by']; ?>"></td>
                    <td><input type="text" class="td-input" value="<?php $row['date_time']; ?>"></td>
                    <?php } else { ?>
					<td><?php echo $row['category']; ?></td>
          <td><?php echo $row['created_by']; ?></td>
          <td><?php echo $row['date_time']; ?></td>
                    <?php } ?>
					<td class="dl"><a class="btn btn-success edit" href="editCategory.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a href="categories.php" class="btn btn-danger">CANCEL</a>
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
  <li><a href="requests.php"><img src="img/notification.png" style="margin-right: 10%;">Requests<span class="badge">3</span></a></li>
  <li><a href="logs.php"><img src="img/logs.png" style="margin-right: 10%;">Logs</a></li>
  <li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
  </ul>
    <br><br><br><br>
    <div class="box-tbl">
	<form method="post" action="">
<input type="text" class="src_bar" placeholder="Search Category..." readonly>
         <button type="submit" id="Suppliers" class="btn btn-primary"name="update">SAVE</button>

         <table>
       			<thead>
       				<tr>
       				<th class="th-css">CATEGORY</th>
       				<th class="th-css" colspan="4">ACTION</th>
       			</tr>
       		</thead>
       			<tbody>
       				<?php while($row = mysqli_fetch_array($results)):?>
                       <tr>
                           <?php if($row['id'] == $_GET['edit']){ ?>
                           <input type="hidden" class="td-input" name="id" value="<?php echo $id; ?>">
                           <td><input type="text" class="td-input" name="category" value="<?php echo $category; ?>"></td>
                           <td><?php echo $row['created_by']; ?></td>
                           <td><?php echo $row['date_time']; ?></td>
                           <?php } else { ?>
       					<td><?php echo $row['category']; ?></td>
                 <td><?php echo $row['created_by']; ?></td>
                 <td><?php echo $row['date_time']; ?></td>
                           <?php } ?>
       					<td class="dl"><a class="btn btn-success edit" href="editCategory.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                               <a href="categories.php" class="btn btn-danger">CANCEL</a>
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
