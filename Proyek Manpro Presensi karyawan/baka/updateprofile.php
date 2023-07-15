<?php
    include "../conn.php";
    $user=$_SESSION["user"];
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $nomorTlp=mysqli_real_escape_string($conn,$_POST["nomorTlp"]);
    $q="UPDATE pegawai SET email='$email',`nomor telepon`='$nomorTlp' WHERE id='".$user["id"]."'";
    mysqli_query($conn,$q);

    header("location:profile.php");
?>