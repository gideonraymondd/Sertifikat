<?php
    include "../conn.php";
    //$user=$_SESSION["user"];
    $id=mysqli_real_escape_string($conn,$_POST["id"]);
    $keterangan=mysqli_real_escape_string($conn,$_POST["keterangan"]);
    $q="UPDATE absen     SET keterangan='$keterangan' WHERE id='".$id."'";
    mysqli_query($conn,$q);

    header("location:dataAbsensi.php");
?>