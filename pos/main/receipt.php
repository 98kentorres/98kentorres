<?php include('../myConnection.php');
       include('includes/linkScript.php');

$user = $_SESSION['SESS_NAME'];
$date = date('h:i A | l | Y-m-d');
	if(isset($_POST['delete'])){
    $query = "select qty as `qty` from receipt";
    $result = mysqli_query($db,$query);
    $qty = mysqli_fetch_array($result);

    $query2 = "select item_name from receipt";
    $result2 = mysqli_query($db,$query2);
    $itemResult = mysqli_num_rows($result2);

    mysqli_query($db, "insert into logs (activity,date) VALUES ('$user | Printed the receipt with a total of | $qty[qty]: QUANTITY | $itemResult:ITEM PRODUCT(S)','$date')");
		mysqli_query($db, "DELETE FROM receipt");
		header('location: products.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/receipt.css">
    <script type="text/javascript" src="js/myScript.js"></script>
</head>

<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>

<header class="nav" id="printbtn">
	<p class="pos" >SIMPLE POS WITH INVENTORY MANAGEMENT SYSTEM</p>
    </header>
<body>
    <form method="post" action="">
    <div class="box-tbl">
        <div class="company">
            <h3>AMA STA. MESA</h3>
            <p>123 Company Street</p>
            <p>City, ST 12345</p>
        </div>

       <div class="upper">
           <?php    $query = "select customer_name as `name`, date as `date` from receipt";
                         $result = mysqli_query($db,$query);
                         $name = mysqli_fetch_array($result);?>

        <b><P>SALES RECEIPT</P></b>
        <p>CUSTOMER  NAME: <?php echo $name['name'];?></p>

        <p>DATE: <?php echo $name['date']?></p>
            </div>
    <table>
        <thead>
            <tr>
                <th class="th">QTY</th>
                <th>ITEM CODE</th>
                <th>ITEM NAME</th>
                <th class="selling">SELLING PRICE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $results = mysqli_query($db, "select * from receipt");
                while($row = mysqli_fetch_array($results)):?>

                <td><?php echo $row['qty'];?></td>
                <td><?php echo $row['item_code'];?></td>
                <td><?php echo $row['item_name'];?></td>
                <td><?php echo number_format ($row['selling_price']);?></td>
            </tr>
          <?php endwhile; ?>

            <footer>
                     <?php $query2 = "select SUM(cash) as `totalCash` from receipt";
                            $result2 = mysqli_query($db,$query2);
                            $totalCash = mysqli_fetch_array($result2);?>
                  <tr>
                    <td class="footer-margin" colspan="3">CASH</td>
                    <td><?php echo number_format ($totalCash['totalCash']);?></td>
                </tr>
                <?php  $query1 = "select SUM(selling_price * qty) as `total` from receipt";
                          $result1 = mysqli_query($db,$query1);
                          $total = mysqli_fetch_array($result1);?>
                <tr>
                  <td class="footer-margin" colspan="3">TOTAL</td>
                  <td><?php echo number_format ($total['total']);?></td>
                </tr>
                <tr>
                    <td class="footer-margin" colspan="3"><b>BALANCE</b></td>
                    <?php if($total['total'] > $totalCash['totalCash']){ ?>
                  <td><?php echo number_format ($total['total'] - $totalCash['totalCash']);?></td>
                <?php } else{ ?>
                  <td><?php echo "0"?></td>
                <?php } ?>
                </tr>
                <tr>
                    <td class="footer-margin" colspan="3"><b>CHANGE</b></td>
                    <?php if($totalCash['totalCash'] < $total['total']){ ?>
                      <td> <?php echo "0"; ?> </td>
                      <?php } else if($totalCash['totalCash'] > $total['total']){ ?>
                        <td><?php echo number_format($totalCash['totalCash'] - $total['total']);?></td>
                      <?php } ?>
                </tr>
            </footer>

        </tbody>
    </table>
        <div class="btns">
        <button type="submit" id ="printbtn" name="delete" class="btn btn-danger cancel">CANCEL</button>
        <a id ="printbtn" class="btn btn-primary ad" href="new_order.php">ADD ORDER</a>
        <input id ="printbtn" type="submit" name="delete" class="btn btn-success" value="PRINT" onclick="window.print();" >


          </div>
        </div>
    </form>
</body>
</html>
