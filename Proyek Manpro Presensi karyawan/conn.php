<?php
	session_start();
    $host   = 'localhost';
	$user   = 'root';
	$password = '';
	$database = 'proyek manpro';

	$conn = mysqli_connect($host, $user, $password);
	mysqli_select_db($conn, $database) or die(mysqli_error($link));


    function gettable($q)
    {
        global $conn;
        $arr=[];
        $res=mysqli_query($conn,$q);

        while ($row=mysqli_fetch_assoc($res))
        {
            $arr[]=$row;
        }
        return $arr;
    }

    function getsingle($q)
    {
        global $conn;

        $res=mysqli_query($conn,$q);

        if ($row=mysqli_fetch_assoc($res))
        {
            return $row;
        }
        else {
            return null;
        }
    }

    function getpost($idx)
    {
        global $conn;
        if (isset($_POST[$idx]))
        {
            return mysqli_real_escape_string($conn,$_POST[$idx]);
        }
        else {
            return "";
        }
    
    }

    function getget($idx)
    {
        global $conn;
        if (isset($_GET[$idx]))
        {
            return mysqli_real_escape_string($conn,$_GET[$idx]);
        }
        else {
            return "";
        }
    
    }
?>