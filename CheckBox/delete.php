<?php
  include "koneksi.php";
  $siswaID=$_GET['id'];
  $query=mysql_query("DELETE FROM siswa WHERE SiswaID='$siswaID'");
  if ($query) {
   header("location:index.php");
  } 
?>