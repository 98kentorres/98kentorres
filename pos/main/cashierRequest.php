<?php include('configCashierRe.php');
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
  $query ="select * from notifs ORDER BY id DESC LIMIT $start_page,$number_per_table"; //limit records, from 0 to 10 student data per table
  $rs = mysqli_query ($db,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/requests.css">
</head>
<header class="nav">
	<p class="pos">SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
    </header>
<body>

     <?php
      $cashier = $_SESSION['SESS_NAME'];
      $position = $_SESSION['SESS_ROLE'];
    if($position == "CASHIER"){?>
      <ul>
<li class="dash"><a href="dashboard.php"><img src="img/dash.png" style="margin-right: 10%;">Dashboard</a></li>
<li><a href="products.php"><img src="img/writing.png" style="margin-right: 10%;">Products</a></li>
<li><a href="categories.php"><img src="img/category.png" style="margin-right: 10%;">Categories</a></li>
<li><a href="suppliers.php"><img src="img/users.png" style="margin-right: 10%;">Suppliers</a></li>
<li><a href="cashierRequest.php"><img src="img/notification.png" style="margin-right: 10%;">My Requests</a></li>
<li><a href="../welcome.php"><img src="img/logout.png" style="margin-right: 10%;">Logout</a></li>
</ul>
<?php $query3 = "select cashier_req from send_request where cashier_req = '$cashier'";
    $rs3 = mysqli_query($db,$query3);
    $cashierNotif = mysqli_num_rows($rs3);
?>
<span class="badge1"><?php echo $cashierNotif?></span>
<br><br>
<div class="dboard">
  <p class="dboard-text"><img class="dboard-img"src="img/black-db.png"><b>Dashboard</b> / <i class="lets">My Requests</i></p>
    </div>
  <br>
   <form method="post" action="">
<div class="box-tbl">
<table>

  <thead>
    <tr>
          <th class="th-css">YOUR REQUEST</th>
          <th class="th-css">NAME</th>
          <th class="th-css">STATUS</th>
          <th class="th-css">HANDLED BY</th>
          <th class="th-css">REQUESTED DATE/TIME</th>
          <th class="th-css">ACTION</th>
      </tr>
  </thead>
    <tbody>
      <?php $notifs = mysqli_query($db, "SELECT * FROM send_request ORDER BY id DESC");
      while($row = mysqli_fetch_array($notifs)):?>
        <tr>
          <?php if($row['cashier_req'] == $user){?>
            <td><center><?php echo $row['note'];?></center></td>
            <td><center><?php echo $row['cashier_req'];?></center></td>
            <?php if($row['status'] == "DENIED") {?>
              <td><center>REQUEST DENIED</center></td>
              <td><center><?php echo $row['handled_by'];?></center></td>
              <td class="activity-font"><center><?php echo $row['date'];?></center></td>
              <td><center><a href="cashierRequest.php?delete=<?php echo $row['id']; ?>"><img src="img/stop.png" title="REMOVE"></a></center></td>
            <?php } else if ($row['status' == "CONFIRMED"]){?>
              <td><center>CONFIRMED REQUEST</center></td>
            <td><center><?php echo $row['handled_by'];?></center></td>
            <td class="activity-font"><center><?php echo $row['date'];?></center></td>
            <td><center><a href="cashierRequest.php?delete=<?php echo $row['id']; ?>"><img src="img/stop.png" title="REMOVE"></a></center></td>
        </tr>
      <?php } } ?>
        <?php endwhile; ?>

    </tbody>
</table>
<div class="center-numbers">
         <?php
             $query2 = "select * from send_request";
             $rs2 = mysqli_query($db,$query2);
             $total = mysqli_num_rows($rs2);
             //echo $total;      :this will auto calculate your students

             $total_page = ceil($total/$number_per_table); // base on your records this will show you how many tables will be created

             if($page>1){
                 echo "<a href='cashierRequest.php?page=".($page-1)."'class='btn btn-default'>← Prev</a>";

             }

             for($i=1;$i<$total_page;$i++){
              //if the total page reached 10 student data (CURRENT TOTAL PAGE IS 2), new number button will be appear which is 3
                 echo "<a href='cashierRequest.php?page=".$i."'class='btn btn-default btn-css'>$i</a>";
             }

             if($i>$page){
                 echo "<a href='cashierRequest.php?page=".($page+1)."'class='btn btn-primary btn-css'>Next →</a>";

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
