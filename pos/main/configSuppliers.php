<?php
/*
$date = date('Y-m-d | h-i A | l')
Y = year  (example format : 2020)
m = months numeric representation(example format: 01)
d = day of the months (example format: 31)
h = 12-hour format
i = minutes
a = am or pm
A = AM or PM
l = monday to sunday format*/
include('../myConnection.php');
$db = mysqli_connect("localhost","root","","webpage");

$id="";
$company="";
$contact_number="";
$contact_name="";
$address="";
$note="";
$req="";
$user = $_SESSION['SESS_NAME'];
$search_result = mysqli_query($db, "select * from suppliers");

if(isset($_POST['SearchProduct']))
{
    $SearchProduct = $_POST['SearchProduct'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `suppliers` WHERE CONCAT(`company`) LIKE '%".$SearchProduct."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `suppliers`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "webpage");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_GET['edit'])){
	           $id = $_GET['edit'];
	           $record = mysqli_query($db, "SELECT * FROM suppliers where id=$id");

	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $company = $n['company'];
                    $contact_name = $n['contact_name'];
                    $contact_number = $n['contact_number'];
                    $address = $n['address'];
                    $note = $n['note'];
		}
    if(isset($_POST['update'])){
    $id = $_POST['id'];
    $RenameCompany = $_POST['company'];
    $RenameContact_number = $_POST['contact_name'];
    $RenameContact_name = $_POST['contact_number'];
    $RenameAddress = $_POST['address'];
    $RenameNote = $_POST['note'];
    $date = date('h:i A | l | Y-m-d');
        mysqli_query($db, "insert into logs (activity,date) VALUES ('$company--$contact_number--$contact_name--$address--$note--::SUPPLIER DETAILS HAS BEEN CHANGED TO::--$RenameCompany--
    $RenameContact_number--$RenameContact_name--$RenameAddress--$RenameNote','$date')");

        mysqli_query($db, "update suppliers set company='$RenameCompany', contact_name='$RenameContact_number', contact_number='$RenameContact_name', address='$RenameAddress', note='$RenameNote' where id=$id");
        header('location: suppliers.php');
    }
}

if(isset($_POST['add'])){
    $company = $_POST['company'];
    $contact_name = $_POST['contact_name'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $date = date('h:i A | l | Y-m-d');

    $query = "select * from suppliers where company = '$company'";
    $result = mysqli_query($db, $query);
    $execute = mysqli_num_rows($result);

    if($execute > 0 ){
        $_SESSION['message'] = "COMPANY NAME ALREADY EXIST IN DATABASE";
    }
    else{
        mysqli_query($db, "insert into logs (activity,date)VALUES ('$user | ADDED NEW SUPPLIER: $company | $contact_name | $contact_number | $address','$date')");

        mysqli_query($db, "insert into suppliers (company,contact_name,contact_number,address,note)
        VALUES ('$company','$contact_name','$contact_number','$address','$note')");
        header('location: suppliers.php');
    }
}

if(isset($_GET['delete'])){
             $id = $_GET['delete'];
	         $record = mysqli_query($db, "SELECT * FROM suppliers where id=$id");
             $date = date('h:i A | l | Y-m-d');
	           if(count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $company = $n['company'];
                    $contact_name = $n['contact_name'];
                    $contact_number = $n['contact_number'];
                    $address = $n['address'];
                    $note = $n['note'];
		}
        mysqli_query($db, "insert into logs (activity,date)VALUES ('($company) COMPANY HAS BEEN DELETED BY: $user','$date')");
        mysqli_query($db, "delete from suppliers where id = $id");
        header('location: suppliers.php');

}

if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
      $page = 1;
  }
  $number_per_table = 5; //number per table page
  $start_page = ($page-1)*5; //$page -1 * 10 = zero. means you'll start from table page 0
  $query ="select * from suppliers ORDER BY id DESC LIMIT $start_page,$number_per_table"; //limit records, from 0 to 10 student data per table
  $rs = mysqli_query ($db,$query);




  if(isset($_POST['request'])){
      $req = $_POST['req'];
      $date = date('h:i A | l | Y-m-d');

          mysqli_query($db, "insert into notifs (notes,requested_by,date) VALUES ('$req','$user','$date')");
          header('location: suppliers.php');
          $_SESSION['message']="YOUR REQUEST HAS BEEN SENT";
      }
?>
