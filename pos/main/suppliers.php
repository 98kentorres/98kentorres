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
  </ul><?php $query3 = "select cashier_req from send_request where cashier_req = '$cashier'";
      $rs3 = mysqli_query($db,$query3);
      $cashierNotif = mysqli_num_rows($rs3);
  ?>
  <span class="badge1"><?php echo $cashierNotif?></span>
  <br><br>
  <div class="dboard">
  <p class="dboard-text"><img class="dboard-img"src="img/black-writing.png"><b>Dashboard</b> / <i class="lets">Suppliers</i></p>
      </div>
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
  <br>
  <div class="box-tbl">
<form method="post" action="">
<input type="text" class="src_bar" name="SearchProduct"placeholder="Search...">
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
    <?php endif ?>
    <thead>
      <tr>
          <th class="th-css">COMPANY</th>
                  <th class="th-css">CONTACT NAME</th>
                  <th class="th-css">CONTACT NO.</th>
                  <th class="th-css">ADDRESS</th>
                  <th class="th-css">NOTE</th>
                </tr>
              </thead>
            <tbody>
      <?php while($row = mysqli_fetch_array($search_result)):?>
              <tr>
        <td><?php echo $row['company']?></td>
                  <td><?php echo $row['contact_name']?></td>
                  <td><?php echo $row['contact_number']?></td>
                  <td><?php echo $row['address']?></td>
                  <td><?php echo $row['note']?></td>
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
    <br><br>
    <div class="dboard">
    <p class="dboard-text"><img class="dboard-img"src="img/black-writing.png"><b>Dashboard</b> / <i class="lets">Suppliers</i></p>
        </div>
      <form method="post" action="suppliers.php">
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
           <div class="popup-bg">
         <h4 class="modal-title h4">ADD SUPPLIER</h4>
       </div>
       <div class="modal-body">
         <input type="hidden" name="id" value="<?php echo $id; ?>" class="boxx">
   <br>
       <input type="text" name="company" value="<?php echo $company; ?>" placeholder="COMPANY" class="boxx" required>
       <br><br>
   <input type="text" name="contact_name" value="<?php echo $contact_name; ?>" placeholder="CONTACT NAME" class="boxx" required>
   <br><br>
   <input type="text" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="contact_number" value="<?php echo $contact_number; ?>" placeholder="CONTACT NUMBER" class="boxx" required>
       <br><br>
       <input type="text" name="address" value="<?php echo $address; ?>" placeholder="ADDRESS" class="boxx" required>
       <br><br>
       <input type="text" name="note" value="<?php echo $note; ?>" placeholder="NOTE" class="boxx" required>
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
<button type="button" id="Suppliers" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD SUPPLIER</button>
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
				<?php while($row = mysqli_fetch_array($rs)):?>
                <tr>
					<td><?php echo $row['company']?></td>
                    <td><?php echo $row['contact_name']?></td>
                    <td><?php echo $row['contact_number']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['note']?></td>
					<td class="dl">
                        <a class="btn btn-edit" href="editSuppliers.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                        <a class="btn btn-delete" href="suppliers.php?delete=<?php echo $row['id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php endwhile;?>
			     </tbody>
	           </table>
        </form><br>
        <div class="center-numbers">
                 <?php
                     $query2 = "select * from suppliers";
                     $rs2 = mysqli_query($db,$query2);
                     $total = mysqli_num_rows($rs2);
                     //echo $total;      :this will auto calculate your students

                     $total_page = ceil($total/$number_per_table); // base on your records this will show you how many tables will be created

                     if($page>1){
                         echo "<a href='suppliers.php?page=".($page-1)."'class='btn btn-default'>← Prev</a>";

                     }

                     for($i=1;$i<$total_page;$i++){
                      //if the total page reached 10 student data (CURRENT TOTAL PAGE IS 2), new number button will be appear which is 3
                         echo "<a href='suppliers.php?page=".$i."'class='btn btn-default btn-css'>$i</a>";
                     }

                     if($i>$page){
                         echo "<a href='suppliers.php?page=".($page+1)."'class='btn btn-primary btn-css'>Next →</a>";

                     }
                     ?>
                   </div>
    </div>
    <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
    </body>
</html>
