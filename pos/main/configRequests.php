<?php 
        include('../myConnection.php');
$db = mysqli_connect("localhost","root","","webpage");
$user = $_SESSION['SESS_NAME'];
if(isset($_GET['delete'])){
             $id = $_GET['delete'];
	         $record = mysqli_query($db, "SELECT * FROM notifs where id=$id");
             $date = date('h:i A | l | Y-m-d');
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $notes= $n['notes'];
                    $requested_by= $n['requested_by'];
		}
    $action = "DENIED";
        mysqli_query($db, "insert into logs (activity,date)VALUES ('$requested_by: Request has been removed by: $user','$date')");
        mysqli_query($db, "insert into send_request (note,cashier_req,status,handled_by,date)VALUES ('$notes','$requested_by','$action','$user','$date')");
        mysqli_query($db, "delete from notifs where id = $id");
        header('location: requests.php');

}


if(isset($_GET['save'])){
             $id = $_GET['save'];
	         $record = mysqli_query($db, "SELECT * FROM notifs where id=$id");
             $date = date('h:i A | l | Y-m-d');
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $notes= $n['notes'];
                    $requested_by= $n['requested_by'];
		}
    $action = "CONFIRMED";
        mysqli_query($db, "insert into logs (activity,date)VALUES ('$requested_by: Request has been confirmed by: $user','$date')");
        mysqli_query($db, "insert into send_request (note,cashier_req,status,handled_by,date)VALUES ('$notes','$requested_by','$action','$user','$date')");
        mysqli_query($db, "delete from notifs where id = $id");
        header('location: requests.php');

}
?>