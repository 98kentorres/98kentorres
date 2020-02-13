<?php include('../myConnection.php');
       include('includes/linkScript.php');
        include('includes/productSideBar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/dboard.css">
    <script type="text/javascript" src="js/myScript.js"></script>
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
      <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">Statistics</i></p>
          </div>
          <?php

 			if(isset($_SESSION['message'])): ?>
 			<div class = "error-msg">
 			<?php
 			echo $_SESSION['message'];
             unset($_SESSION['message']);
 			?>
 			</div>
 			<?php endif ?>
      <br>
<br><br><br><br>
  <div class="container box-tbl">

      <div class="col-sm-3">
        <div class="panel panel-primary">
          <div class="panel-heading activee"><img src="img/writing.png" style="margin-right: 10%;">PRODUCTS</div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="panel panel-primary">
          <div class="panel-heading activee"><img src="img/users.png" style="margin-right: 10%;">SUPPLIERS</div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="panel panel-primary">
          <div class="panel-heading activee"><img src="img/users.png" style="margin-right: 10%;">CATEGORIES</div>
        </div>
      </div>


       <?php
  		$query_product = "select * from products";
          $result1 = mysqli_query($db,$query_product);
          $total_product = mysqli_num_rows($result1);
  		?>
         <div class="container2">
      <div class="box">
          <div class="chart " data-percent="<?php echo $total_product; ?>"><?php echo $total_product; ?></div>
          <a href="products.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
       </div>
             <?php
  		$query_suppliers = "select * from suppliers";
          $result2 = mysqli_query($db,$query_suppliers);
          $total_suppliers = mysqli_num_rows($result2);
  		?>
             <div class="box margin">
          <div class="supply chart" data-percent="<?php echo $total_suppliers; ?>"><?php echo $total_suppliers; ?></div>
          <a href="suppliers.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
       </div>

             <?php
  		$query_customer = "select * from categories";
          $result3 = mysqli_query($db,$query_customer);
          $total_customers = mysqli_num_rows($result3);
  		?>
             <div class="box margin2">
          <div class="chart " data-percent="<?php echo $total_customers; ?>"><?php echo $total_customers; ?></div>
          <a href="categories.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
       </div>

     </div></div>
     <style>
     .cashier{
       margin-left: 9%;
     }
     .box-tbl{
      margin-left: 20%;
     }
     </style>
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
  ?><span class="badge"><?php echo $notification;?></span>
<br><br>
<div class="dboard">
    <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">Statistics</i></p>
        </div>
    <br>
<div class="container box-tbl">

    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading activee"><img src="img/writing.png" style="margin-right: 10%;">PRODUCTS</div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading activee"><img src="img/users.png" style="margin-right: 10%;">SUPPLIERS</div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading activee"><img src="img/notification.png" style="margin-right: 10%;">REQUESTS</div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading activee"><img src="img/sales.png" style="margin-right: 10%;">SALES REPORT</div>
      </div>
    </div>

     <?php
		$query_product = "select * from products";
        $result1 = mysqli_query($db,$query_product);
        $total_product = mysqli_num_rows($result1);
		?>
       <div class="container2">
    <div class="box">
        <div class="chart " data-percent="<?php echo $total_product; ?>"><?php echo $total_product; ?></div>
        <a href="products.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
     </div>
           <?php
		$query_suppliers = "select * from suppliers";
        $result2 = mysqli_query($db,$query_suppliers);
        $total_suppliers = mysqli_num_rows($result2);
		?>
           <div class="box margin">
        <div class="supply chart" data-percent="<?php echo $total_suppliers; ?>"><?php echo $total_suppliers; ?></div>
        <a href="suppliers.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
     </div>

           <?php
		$query_customer = "select * from notifs";
        $result3 = mysqli_query($db,$query_customer);
        $total_customers = mysqli_num_rows($result3);
		?>
           <div class="box margin2">
        <div class="chart " data-percent="<?php echo $total_customers; ?>"><?php echo $total_customers; ?></div>
        <a href="requests.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
     </div>

           <?php
		$query_sales = "select * from sales_report";
        $result4 = mysqli_query($db,$query_sales);
        $total_sales = mysqli_num_rows($result4);
		?>
           <div class="box margin ">
        <div class="chart " data-percent="<?php echo $total_sales; ?>"><?php echo $total_sales; ?></div>
        <a href="sales_report.php"><div class="panel-footer vw">VIEW<img class="arrow" src="img/right-arrow.png"></div></a>
     </div>

           <div class="lower-box">
              <?php
        $account_limit2 = 10;
		$query_account2 = "select * from categories";
        $account_result2 = mysqli_query($db,$query_account2);
        $total_account2 = mysqli_num_rows($account_result2);

		?>
           <div class="box margin" id="accounts">
        <div class="chart" data-percent="<?php echo $account_limit2; ?>">
            <?php if($total_account2 == $account_limit2){
            echo "FULL";
            }
            else{ ?>
              <div class="count">  <?php echo $total_account2; ?>
               </div><p class="margin" id="account-limit">\<p class="margin" id="number"> 30</p>
            <?php } ?></div>
        <div class="panel-footer footer vw" id="reduce">CATEGORIES <a href="categories.php">VIEW<img class="btm-arrow" src="img/right-arrow.png"></a></div>
     </div>


               <?php
        $account_limit = 10;
		$query_account = "select * from account";
        $account_result = mysqli_query($db,$query_account);
        $total_account = mysqli_num_rows($account_result);

		?>
           <div class="box margin" id="accounts">
        <div class="chart" data-percent="<?php echo $account_limit; ?>">
            <?php if($total_account == $account_limit){
            echo "FULL";
            }
            else{ ?>
              <div class="count">  <?php echo $total_account; ?>
               </div><p class="margin" id="account-limit">\<p class="margin" id="number">10</p>
            <?php } ?></div>
        <div class="panel-footer footer vw" id="reduce">ACCOUNTS <a href="accounts.php">VIEW<img class="btm-arrow" src="img/right-arrow.png">
            </a></div>

     </div>
    </div>
   </div></div>
   <?php
       } else {
      header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  }
       ?>
</body>
</html>
