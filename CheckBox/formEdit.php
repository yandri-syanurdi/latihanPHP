<?php
  include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div align="center">
    <h3><b>Form Edit Data</b></h3>
    <?php
    //menampilkan data siswa berdasarkan siswaID
      $siswaID=$_GET['id'];
      $sql=mysql_query("SELECT * FROM siswa WHERE SiswaID='$siswaID'");
      $data=mysql_fetch_array($sql);
      //data hobi dari tabel siswa 
      $datahobi=explode(',', $data['hobi']);
      
       
    ?>
    <form method="POST">
      <table>
        <tr>
        <td width="60px" valign="top">Nama</td>
        <td valign="top"> 
         <input type="text" name="nama" id="nama" value="<?=$data['nama']?>">
        </td>
       </tr>
       <tr>
        <td width="60px" valign="top">Hobi</td>
        <td valign="top"> 
         <label><input type="checkbox" name="hobi[]" value="Nonton" <?php if (in_array("Nonton", $datahobi)) echo "checked";?> >Nonton</label><br>
         <label><input type="checkbox" name="hobi[]" value="Menulis" <?php if (in_array("Menulis", $datahobi)) echo "checked";?> >Menulis</label><br>
         <label><input type="checkbox" name="hobi[]" value="Traveling" <?php if (in_array("Traveling", $datahobi)) echo "checked";?> >Traveling</label><br>
         <label><input type="checkbox" name="hobi[]" value="Otomotif" <?php if (in_array("Otomotif", $datahobi)) echo "checked";?> >Otomotif</label><br>
         <label><input type="checkbox" name="hobi[]" value="Fotografi" <?php if (in_array("Fotografi", $datahobi)) echo "checked";?> >Fotografi</label><br>
         <label><input type="checkbox" name="hobi[]" value="Programming" <?php if (in_array("Programming", $datahobi)) echo "checked";?>  >Programming</label>
        </td>
       </tr>
       <tr>
        <td width="60px" valign="top"></td>
        <td valign="top"> 
         <input type="submit" name="update" value="Update">
          <a href="index.php">Batal</a>
        </td>
       </tr>
      </table>
     </form>
      <?php
        if (isset($_POST['update'])) {
          $nama = $_POST['nama'];
          $hobi = implode(",", $_POST['hobi']);
          $query=mysql_query("UPDATE siswa SET nama='$nama', hobi='$hobi' WHERE SiswaID='$siswaID' ");  
          if ($query) {
             header("location:index.php");
           } 
        }
       ?>
  </div>
</body>
</html>