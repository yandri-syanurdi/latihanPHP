<!DOCTYPE html>
<html>
 <head>
  <title> Penggunaan Input Type Checkbox di HTML dan PHP</title>
 </head>
 <body>
   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
   Pilih Hobi yang kamu suka dibawah ini : <br>
   <input type="checkbox" name="hobi[]" value="Membaca"> Membaca<br>
<input type="checkbox" name="hobi[]" value="Sepak Bola"> Sepak Bola<br>
<input type="checkbox" name="hobi[]" value="Programming"> Programming<br> 
    <input type="submit" value="Submit">
  </form>
  
  <?php
     //Mengecek apakah ada nilai hobi yang dikirim dari form
    if (isset($_POST['hobi'])) {

        $hobi=$_POST['hobi'];
		echo "<br>";
        for ($i=0; $i < count($hobi) ; $i++){
            echo $hobi[$i]."<br>";
        }
    }
  ?>
 </body>
</html>