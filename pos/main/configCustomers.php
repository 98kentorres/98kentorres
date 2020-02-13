<?php   include('../myConnection.php');

$db = mysqli_connect("localhost","root","","webpage");


$name= "";
$address= "";
$contact= "";
$product_name= "";
$due_date= "";
$note= "";
$id= "";

if(isset($_GET['edit'])){
	           $id = $_GET['edit'];
	           $record = mysqli_query($db, "SELECT * FROM customers where id=$id");

	           if(@count($record) == 1 ){
                    $n = mysqli_fetch_array($record);
                    $id = $n['id'];
                    $name = $n['name'];
                    $address = $n['address'];
                    $contact = $n['contact'];
                    $product_name = $n['product_name'];
                    $due_date = $n['due_date'];
                    $note = $n['note'];
		}
}


if(isset($_POST['SearchProduct']))
{
    $SearchProduct = $_POST['SearchProduct'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `customers` WHERE CONCAT(`name`,`address`,`contact`,`product_name`,`due_date`) LIKE '%".$SearchProduct."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `customers`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "webpage");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


if(isset($_POST['add'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$product_name = $_POST['product_name'];
	$due_date = $_POST['due_date'];
	$note = $_POST['note'];

	mysqli_query($db,"INSERT INTO customers (name,address,contact,product_name,due_date,note) VALUES ('$name', '$address', '$contact', '$product_name', '$due_date', '$note')");
	header('location: customers.php');
}
if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($db, "DELETE FROM customers where id=$id");
		$_SESSION['message'] = "Selected customer Deleted!!!";
	}

?>
