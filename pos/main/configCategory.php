<?php include('../myConnection.php');
$db = mysqli_connect("localhost","root","","webpage");

$category="";
$req="";
$created_date = date('h:i A | l | Y-m-d');
$user = $_SESSION['SESS_NAME'];
if(isset($_POST['add'])){
    $category = $_POST['category'];
    $date = date('h:i A | l | Y-m-d');
    $createdby = $_POST['createdby'];
    $query = "select * from categories where category = '$category'";
    $result = mysqli_query($db, $query);
    $execute = mysqli_num_rows($result);

    if($execute > 0 ){
        $_SESSION['message'] = "CATEGORY NAME ALREADY EXIST IN DATABASE";
    }
    else{
        mysqli_query($db, "insert into logs (activity,date) VALUES ('$user | ADDED NEW CATEGORY: $category','$date')");

        mysqli_query($db, "insert into categories (category,created_by,date_time) VALUES ('$category','$createdby','$created_date')");
        header('location: categories.php');
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $date = date('h:i A | l | Y-m-d');
    $record = mysqli_query($db, "SELECT * FROM categories where id=$id");

    if(@count($record) == 1 ){
            $n = mysqli_fetch_array($record);
            $id = $n['id'];
            $category = $n['category'];
    }
    mysqli_query($db, "insert into logs (activity,date) VALUES ('($category) HAS BEEN DELETED BY: $user','$date')");

    mysqli_query($db, "delete from categories where id = $id");
    header('location: categories.php');

}


if(isset($_GET['edit'])){
	           $id = $_GET['edit'];
	           $record = mysqli_query($db, "SELECT * FROM categories where id=$id");
	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $category = $n['category'];
               }

            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $renameCategory = $_POST['category'];
                $date = date('h:i A | l | Y-m-d');
                 mysqli_query($db, "insert into logs (activity,date) VALUES ('$user CHANGED THE |$category| TO $renameCategory','$date')");
                 mysqli_query($db, "update categories set category='$renameCategory' where id=$id");
                 header('location: categories.php');
    }
}


if(isset($_POST['request'])){
    $req = $_POST['req'];

        mysqli_query($db, "insert into notifs (notes,requested_by,date) VALUES ('$req','$user','$created_date')");
        header('location: categories.php');
        $_SESSION['message']="YOUR REQUEST HAS BEEN SENT";
    }


if(isset($_POST['SearchProduct']))
{
    $SearchProduct = $_POST['SearchProduct'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `categories` WHERE CONCAT(`category`) LIKE '%".$SearchProduct."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `categories`";
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
