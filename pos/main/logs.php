<?php include('../myConnection.php');
       include('includes/linkScript.php');

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
  $query ="select * from logs ORDER BY id DESC LIMIT $start_page,$number_per_table"; //limit records, from 0 to 10 student data per table
  $rs = mysqli_query ($db,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/logs.css">
</head>
<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
    </header>
<body>
     <?php $position = $_SESSION['SESS_ROLE'];
    if($position == "CASHIER"){
        header('location: dashboard.php');
        $_SESSION['message'] = "CASHIERS ARE NOT ALLOWED TO CHECK LOGS";
    } else if ($position == "ADMINISTRATOR") { ?>
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
    <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">Logs</i></p>
        </div>
    <br>
     <form method="post" action="logs.php">
<div class="box-tbl">
  <table>
    <thead>
        <tr>
            <th class="th-css" colspan="2">LATEST ACTIVITY LOGS</th>
        </tr>
    </thead>
      <tbody>
        <?php $logs = mysqli_query($db, "SELECT * FROM logs ORDER BY id DESC");
        while($row = mysqli_fetch_array($rs)):?>
          <tr>
              <td class="activity-font"><?php echo $row['activity'];?></td>
              <td class="activity-font"><?php echo $row['date']; ?></td>
          </tr>
          <?php endwhile; ?>
      </tbody>
  </table>
  <div class="center-numbers">
           <?php
               $query2 = "select * from logs";
               $rs2 = mysqli_query($db,$query2);
               $total = mysqli_num_rows($rs2);
               //echo $total;      :this will auto calculate your students

               $total_page = ceil($total/$number_per_table); // base on your records this will show you how many tables will be created

               if($page>1){
                   echo "<a href='logs.php?page=".($page-1)."'class='btn btn-default'>← Prev</a>";

               }

               for($i=1;$i<$total_page;$i++){
                //if the total page reached 10 student data (CURRENT TOTAL PAGE IS 2), new number button will be appear which is 3
                   echo "<a href='logs.php?page=".$i."'class='btn btn-default btn-css'>$i</a>";
               }

               if($i>$page){
                   echo "<a href='logs.php?page=".($page+1)."'class='btn btn-primary btn-css'>Next →</a>";

               }
               ?>
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
