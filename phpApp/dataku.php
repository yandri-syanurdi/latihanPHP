<?php
include "koneksimysql.php";
$sql=$conn->query("select * from siswa");
while($rs=$sql->fetch_object()){
    echo $rs->nis." ".$rs->nama." ".$rs->kelas."<br>";
}
?>