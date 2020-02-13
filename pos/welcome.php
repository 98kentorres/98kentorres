<?php include('main/includes/welcome.php');
      include('myConnection.php');

      unset($_SESSION['SESS_NAME']);
      unset($_SESSION['SESS_ROLE']);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main/css/welcome.css">
    </head>
<body><br>
    <?php

			if(isset($_SESSION['message'])): ?>
			<div class = "error-msg">
			<?php
			echo $_SESSION['message'];
            $sec = "5";
            header("Refresh: $sec");
            unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?>

    <form method="post" action="">
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
           <div class="popup-bg">
         <h4 class="modal-title h4">POS WITH INVENTORY MANAGEMENT</h4>
       </div>
       <div class="modal-body">
   <br>
       <input type="text" name="username" value="" placeholder="USERNAME" class="boxx" required>
       <br><br>
   <input type="password" name="password" value="" placeholder="PASSWORD" class="boxx" required>
       </div>
   <br><br>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
          <button type="submit" name="login" id="btn" class="btn btn-success">SIGN IN</button>
           </div>
       </div>
     </div>
   </div>
 </div>
 </form>


    <!--<div class="nav">
        <h2 class="pos">AMA COMPUTER COLLEGE</h2>
    </div>

    <div class="underline">

    </div>
    -->

    <div class="system">
        <p>POINT OF SALES WITH INVENTORY MANAGEMENT</p>
    </div>

    <div class="info">
    <p>Some features of the system</p>
    </div>

    <div class="underline2">

    </div>

    <div class="info2">
    <p>that can store products shows categories, lists of suppliers</p>
    </div>

    <div class="info3">
    <p>lists of categories and accounts with sales reports, this</p>
    </div>

    <div class="info4">
    <p>system does also have a latest activity logs that can</p>
    </div>

    <div class="info5">
    <p>automatically shows you if the cashier updated</p>
    </div>

    <div class="info6">
    <p>something or delete products & even add</p>
    </div>
    <button type="button" id="login" class="btn btn-success" data-toggle="modal" data-target="#myModal">SIGN IN</button>
</body>
</html>
