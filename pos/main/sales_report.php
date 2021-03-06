<?php include('configSales_report.php');
      include('includes/linkScript.php');
       include('includes/productSideBar.php');

       if(isset($_GET['page']))
       {
           $page = $_GET['page'];
       }
       else
       {
           $page = 1;
       }
       $number_per_table = 15; //number per table page
       $start_page = ($page-1)*15; //$page -1 * 10 = zero. means you'll start from table page 0
       $query ="select * from sales_report ORDER BY id DESC LIMIT $start_page,$number_per_table"; //limit records, from 0 to 10 student data per table
       $rs = mysqli_query ($db,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reports.css">
</head>
<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
</header>


<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='CASHIER') {
    header('location: dashboard.php');
    $_SESSION['message'] = "CASHIERS ARE NOT ALLOWED TO VIEW SALES REPORTS!";
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
  </ul><?php $query3 = "select * from notifs";
      $rs3 = mysqli_query($db,$query3);
      $notification = mysqli_num_rows($rs3);
  ?>
  <span class="badge"><?php echo $notification;?></span>
    <br><br><br>
    <div class="container">
    <div class="input-box">
		<?php
		$query2 = "select * from sales_report";
        $rs2 = mysqli_query($db,$query2);
        $total = mysqli_num_rows($rs2);
		?>
      <h3 id="std_text"><i><b>TOTAL REPORTS [<?php echo $total;?>]</b></i></h3>
	</div>
	<div class="input-boxx">
      <h3 id="std_text"><i><b>TOTAL AMOUNT [<?php echo number_format($overallTotal['OverallTotal']);?>]</b></i></h3>
	</div>
        <br>
    </div>
    <div class="box-tbl">
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
                <th class="th-css">ITEM CODE</th>
				<th class="th-css">ITEM NAME</th>
                <th class="th-css">CUSTOMER NAME</th>
				<th class="th-css">CATEGORY</th>
				<th class="th-css">DATE</th>
				<th class="th-css">SELLING PRICE</th>
				<th class="th-css">QTY</th>
				<th class="th-css">TOTAL</th>
			</tr>
		</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($rs)):?>
                <tr>
                    <td class="td"><?php echo $row['item_code']; ?></td>
					<td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td><?php echo number_format($row['selling_price']); ?></td>
					<td><?php if($row['qty'] <= 0)
                    {
                        echo "0";
                    }else
                    {
                        echo $row['qty']; ?></td>
                <?php    } ?>
					<td><?php echo number_format($row['selling_price'] * $row['qty']);?></td>
                </tr>
                <?php endwhile;?>
			     </tbody>
         </table><br>
             <div class="center-numbers">
                      <?php
                          $query2 = "select * from sales_report";
                          $rs2 = mysqli_query($db,$query2);
                          $total = mysqli_num_rows($rs2);
                          //echo $total;      :this will auto calculate your students

                          $total_page = ceil($total/$number_per_table); // base on your records this will show you how many tables will be created

                          if($page>1){
                              echo "<a href='sales_report.php?page=".($page-1)."'class='btn btn-default'>← Prev</a>";

                          }

                          for($i=1;$i<$total_page;$i++){
                           //if the total page reached 10 student data (CURRENT TOTAL PAGE IS 2), new number button will be appear which is 3
                              echo "<a href='sales_report.php?page=".$i."'class='btn btn-default btn-css'>$i</a>";
                          }

                          if($i>$page){
                              echo "<a href='sales_report.php?page=".($page+1)."'class='btn btn-primary btn-css'>Next →</a>";

                          }
                          ?>
                        </div>
    </div>
    <?php } else {
    header('location: ../welcome.php');
      $_SESSION['message'] = "This system is protected, you must login your account first!";
  } ?>
    </body>
</html>
