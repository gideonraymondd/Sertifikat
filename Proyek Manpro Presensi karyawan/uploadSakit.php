<?php
    include "conn.php";
    $user=$_SESSION["user"];
    $mulai=mysqli_real_escape_string($conn,$_POST["ijinDari"]);
    $berakhir=mysqli_real_escape_string($conn,$_POST["ijinSampai"]);
    $alasan=mysqli_real_escape_string($conn,$_POST["alasan"]);
    $q="INSERT INTO cuti (pegawai_id, tanggal_mulai, tanggal_berakhir, `status`, alasan) VALUES ('$user', '$mulai', '$berakhir', '2', '$alasan')";
    mysqli_query($conn,$q);

    header("location:ijinSakit.php");
?>