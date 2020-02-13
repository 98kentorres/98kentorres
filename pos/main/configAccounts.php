<?php   include('../myConnection.php');

$db = mysqli_connect("localhost","root","","webpage");

$id="";
$user="";
$pass="";
$fullname="";
$role="";
$contact="";

if(isset($_POST['add'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $contact = $_POST['contact'];
    $date = date('h:i A | l | Y-m-d');
    
    $query = "select * from account where category = '$user'";
    $result = mysqli_query($db, $query);
    $execute = mysqli_num_rows($result);

    if($execute > 0 ){
        $_SESSION['message'] = "USERNAME ALREADY EXIST IN DATABASE";
    }
    else{
        mysqli_query($db, "insert into logs (activity,date)VALUES ('NEW ACCOUNT ADDED:: $user | $pass | $fullname | $role | $contact','$date')");
        mysqli_query($db, "insert into account (user,pass,fullname,role,contact) VALUES ('$user','$pass','$fullname','$role','$contact')");
        header('location: accounts.php');
    }
}

if(isset($_GET['delete'])){
     $id = $_GET['delete'];
	         $record = mysqli_query($db, "SELECT * FROM account where id=$id");
             $date = date('h:i A | l | Y-m-d');
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $fullname = $n['fullname'];
                    $role = $n['role'];
		}
        mysqli_query($db, "insert into logs (activity,date)VALUES ('$role: ($fullname) ACCOUNT HAS BEEN DELETED','$date')");

    mysqli_query($db, "delete from account where id = $id");
    header('location: accounts.php');

}

if(isset($_GET['edit'])){
	           $id = $_GET['edit'];
	           $record = mysqli_query($db, "SELECT * FROM account where id=$id");

	           if(@count($record) == 1 ){
          $n = mysqli_fetch_array($record);
          $id = $n['id'];
          $user = $n['user'];
          $pass = $n['pass'];
          $fullname = $n['fullname'];
          $role = $n['role'];
          $contact = $n['contact'];
        }
        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $Rename_user = $_POST['user'];
            $Rename_pass = $_POST['pass'];
            $Rename_fullname = $_POST['fullname'];
            $Rename_role = $_POST['role'];
            $Rename_contact = $_POST['contact'];
            $date = date('h:i A | l | Y-m-d');
            mysqli_query($db, "insert into logs (activity,date)VALUES ('$user::$pass::$fullname::$role::$contact --ACCOUNT HAS BEEN CHANGED TO--$Rename_user::$Rename_pass::$Rename_fullname::$Rename_role::$Rename_contact','$date')");
            
            mysqli_query($db, "update account set user='$Rename_user', pass='$Rename_pass', fullname='$Rename_fullname', role='$Rename_role', contact='$Rename_contact' where id=$id");
            header('location: accounts.php');
}
}

$search_result = mysqli_query($db, "select * from account");


if(isset($_POST['SearchProduct']))
{
    $SearchProduct = $_POST['SearchProduct'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `account` WHERE CONCAT(`user`,`pass`,`fullname`,`role`,`contact`) LIKE '%".$SearchProduct."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `account`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "webpage");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
