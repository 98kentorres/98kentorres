<?php 
        include('../myConnection.php');
$db = mysqli_connect("localhost","root","","webpage");
$user = $_SESSION['SESS_NAME'];


if(isset($_GET['delete'])){
             $id = $_GET['delete'];
	         $record = mysqli_query($db, "SELECT * FROM send_request where id=$id");
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
		}
        mysqli_query($db, "delete from send_request where id = $id");
        header('location: cashierRequest.php');

}
?>