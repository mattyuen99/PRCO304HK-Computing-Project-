<?php

include_once( dirname(__FILE__). '/includes/config.php' );

if(isset($_POST['add_personnel']))
{
	$Service = $_POST['Service'];
	$Phone = $_POST['Phone'];
	$Date = $_POST['Date'];
	$account = $_POST['account'];
	$password = $_POST['password'];
	$address = $_POST['address'];

    $query_2 = "INSERT INTO personnel SET Service='$Service', Phone='$Phone', Date='$Date', account='$account', password='$password', address='$address'";

    $result_2 = mysqli_query($connection, $query_2);
    $affected_rows_2 = $connection->affected_rows;
    if(!$result_2)
    {
        $_SESSION['msg'] = "SQL Error: " . mysqli_error($connection);
        $goto = $website_url . '/user/index.php';
        echo "<script>window.location='".$goto."';</script>";
        exit;
    }
    else
    {
        $_SESSION['msg'] = "Account Added Successfully.";
        $goto = $website_url . '/user/index.php';
        echo "<script>window.location='".$goto."';</script>";
        exit;
    }
}

else if(isset($_POST['delete_personnel']))
{
	$personnel_auto_id = $_POST['personnel_auto_id'];
    
    $query_2 = "DELETE FROM personnel WHERE auto_id='$personnel_auto_id'";
    
    $result_2 = mysqli_query($connection, $query_2);
    $affected_rows_2 = $connection->affected_rows;

    if(!$result_2)
    {
        $_SESSION['msg'] = "SQL Error: " . mysqli_error($connection);
        $goto = $website_url . '/user/index.php';
        echo "<script>window.location='".$goto."';</script>";
        exit;
    }
    else
    {
        $_SESSION['msg'] = "Account Deleted Successfully.";
        $goto = $website_url . '/user/index.php';
        echo "<script>window.location='".$goto."';</script>";
        exit;
    }
}
else
{
    $goto = $website_url . '/login.php';
    echo "<script>window.location='".$goto."';</script>";
    exit;
}

?>