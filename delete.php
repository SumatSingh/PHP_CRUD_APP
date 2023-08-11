<?php
include 'db.php';
// get data in table.php url
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // echo $delete_id;

    // delete query
    $delete_data = mysqli_query($conn, "Delete from `employees` where
    id=$delete_id") or die("data Not Deleted");

    // condition
    if ($delete_data) {
        header('location:table.php');
    } else {
        header('location:table.php');
    }

}
?>