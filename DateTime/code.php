<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");

if(isset($_POST['save_datetime']))
{
    $name = $_POST['name'];
    $event_dt = $_POST['event_dt'];

    $query = "INSERT INTO demo (name,eventdt) VALUES ('$name','$event_dt')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date Time Inserted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Date Time Not Inserted";
        header("Location: index.php");
    }
}
?>