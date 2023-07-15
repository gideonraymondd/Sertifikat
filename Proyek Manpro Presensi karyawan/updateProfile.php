<?php
    include "conn.php";
    $user=$_SESSION["user"];
    $nama=mysqli_real_escape_string($conn,$_POST["nama"]);
    $tglLahir=mysqli_real_escape_string($conn,$_POST["tglLahir"]);
    $jabatan=mysqli_real_escape_string($conn,$_POST["jabatan"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $nomorTlp=mysqli_real_escape_string($conn,$_POST["nomorTlp"]);
    $q="UPDATE pegawai SET jabatan='$jabatan',nama='$nama',`tanggal lahir`='$tglLahir',email='$email',`nomor telepon`='$nomorTlp' WHERE id='".$user["id"]."'";
    mysqli_query($conn,$q);

    header("location:profilePegawai.php");
?>