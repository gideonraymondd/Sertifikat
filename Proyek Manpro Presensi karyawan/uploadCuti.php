<?php
    include "conn.php";
    $user=$_SESSION["user"];
    print_r($user);
    echo "<br/>";
    $fileuser="";
    if (isset($_FILES["file"]))
    {
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileuser=rand(1,1000).date("YMDHis").$_FILES['file']["name"];
        $fileDestination = 'Foto/'.$fileuser;
        //echo "Dest ".$fileDestination;
        if (move_uploaded_file($fileTempName, $fileDestination))
        {
            
        }
        else {
            $fileuser="";
        }
    
    }
    $mulai=mysqli_real_escape_string($conn,$_POST["cutiDari"]);
    $berakhir=mysqli_real_escape_string($conn,$_POST["cutiSampai"]);
    $alasan=mysqli_real_escape_string($conn,$_POST["alasan"]); 
    $tipe=mysqli_real_escape_string($conn,$_POST["tipe"]); 
    $q="INSERT INTO cuti (pegawai_id, tanggal_mulai, tanggal_berakhir, `status`, alasan,file,tipe) VALUES ('".$user["id"]."', '$mulai', '$berakhir', '1', '$alasan','$fileuser','$tipe')";
    mysqli_query($conn,$q);

    header("location:ijinCuti.php?tipe=".$tipe);
?>