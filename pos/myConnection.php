<?php
$db= mysqli_connect('localhost', 'root', '','webpage');
session_start();
$user="";
$pass="";
/*if(isset($_POST['login'])){
  $user=$_POST['username'];
  $pass=$_POST['password'];
 $query = mysqli_query($db, "SELECT * FROM account WHERE user='$user' AND pass='$pass'");
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location: main/dashboard.php");
 }
 else
 {
$_SESSION['message'] = "INVALID USER/PASS";
 }
 mysqli_close($db);
 }
 */

if(isset($_POST['login'])){
	$user=$_POST['username'];
    $pass=$_POST['password'];
    $query="SELECT * FROM account WHERE user='$user' AND pass='$pass'";
	$result=mysqli_query($db,$query);
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			$row = mysqli_fetch_assoc($result);
			$_SESSION['SESS_ID'] = $row['id'];
			$_SESSION['SESS_NAME'] = $row['fullname'];
			$_SESSION['SESS_ROLE'] = $row['role'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			header("location: main/dashboard.php");
			exit();
		}else{
            header("location: welcome.php");
        }
    }
}
?>
