<?php
    include "../conn.php";

    $username=getpost("email");
    $password=getpost("password");

    echo $username."<br/>";
    echo $password;

    $q="SELECT * FROM pegawai WHERE email='$username' AND password='$password'";
    //echo $q;
    $hasil=getsingle($q);
    if ($hasil==null)
    {
       header("location:../login.php?warning=".urlencode("Email dan password tidak ditemukan"));
    }
    else {
       // print_r($hasil);
    
        $_SESSION["user"]=$hasil;
        if ($hasil["level"]=="pegawai")
        {
            header("location:../home.html");
        }
        else {
            header("location:../baka/home.html");
        }
        
    }
?>