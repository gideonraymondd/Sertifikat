<?php
     include "../conn.php";
     $id=mysqli_real_escape_string($conn,$_GET["id"]);
     $q="UPDATE cuti SET status='2' WHERE id='$id'";
     mysqli_query($conn,$q);

     header("location:pengajuanCuti.php");
?>