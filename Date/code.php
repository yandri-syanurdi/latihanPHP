<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");

if(isset($_POST['save_date']))
{
    $name = $_POST['name'];
    $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));

    $query = "INSERT INTO demo (name,dob) VALUES ('$name','$dob')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date values Inserted";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Date values Inserting Failed";
        header("Location: index.php");
    }
}
?>