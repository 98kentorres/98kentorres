<?php include('configAccounts.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/accounts.css">
</head>
<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
</header>


<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='CASHIER') {
    header('location: dashboard.php');
    $_SESSION['message'] = "CASHIERS ARE NOT ALLOWED TO VIEW ACCOUNTS!";
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
  ?><span class="badge"><?php echo $notification;?></span>
    <br><br>
    <div class="dboard">
    <p class="dboard-text"><img class="dboard-img"src="img/accs.png"><b>Dashboard</b> / <i class="lets">Accounts</i></p>
        </div>
        <form method="post" action="accounts.php">
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
           <div class="popup-bg">
         <h4 class="modal-title h4">ADD ACCOUNT</h4>
       </div>
       <div class="modal-body">
         <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
   <br>
       <input type="text" name="user" value="<?php echo $user; ?>" placeholder="USERNAME" class="boxx" required>
       <br><br>
   <input type="text" name="pass" value="<?php echo $pass; ?>" placeholder="PASSWORD" class="boxx" required>
   <br><br>
   <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="FULLNAME" class="boxx" required>
       <br><br>
       <input type="text" name="role" value="CASHIER" placeholder="ROLE" class="boxx"id="cashier" readonly>
       <br><br>
       <input type="text" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="contact"
       value="<?php echo $contact; ?>" placeholder="CONTACT" class="boxx" required>
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
    <br>
    <div class="box-tbl">
	<form method="post" action="">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
<button type="button" id="Suppliers" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD ACCOUNT</button>

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
                <th class="th-css">USERNAME</th>
                <th class="th-css">PASSWORD</th>
        				    <th class="th-css">FULLNAME</th>
                    <th class="th-css">POSITION</th>
                    <th class="th-css">CONTACT</th>
				<th class="th-css">ACTION</th>

			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['pass']; ?></td>
					          <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
					<td class="dl">
                        <a class="btn-edit" href="editAccount.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a class="btn-delete" href="accounts.php?delete=<?php echo $row['id']; ?>">DELETE</a>
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
