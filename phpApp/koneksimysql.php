<?php
$conn = new mysqli("localhost","root","","sekolah");
mysqli_connect_errno();

 //$conn->query("insert into siswa(nis,nama,kelas) values('111','Santy','Kelas 10') ");
 $conn->query("insert into siswa(nis,nama,kelas) values('111','ulan','Kelas 10') ");
?>