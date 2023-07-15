<?php
    include "../conn.php";
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
      
        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    $lat=-7.3398796;
    $lng=112.7371386;
    $latitude=getpost("latitude");
    $longitude=getpost("longitude");
    $user=getpost("user");
    
    $checking="";
    $distance=distance($lat,$lng,$latitude,$longitude,"K");
    if ($distance>10)
    {
        $checking="Jarak terlalu jauh";
    }
    else {
        //echo "aa";
        //$q="SELECT * FROM hari WHERE DATE_FORMAT(hari,'%d-%M-%Y')=DATE_FORMAT(SYSDATE(),'%d-%M-%Y') AND status='masuk'";
        //echo $q."<br/>";
        //$hasil=getsingle($q);
        //echo "bb";
        //if ($hasil==null)
        if (false)
        {
            $checking="Hari ini tidak boleh absen";
        }
        else {
            $q="SELECT * FROM absen WHERE DATE_FORMAT(tanggal,'%d-%M-%Y')=DATE_FORMAT(SYSDATE(),'%d-%M-%Y') AND pegawai_id='$user' AND status='1'";
            $hasil2=getsingle($q);
            if ($hasil2==null)
            {
                $q="INSERT INTO absen (tanggal,pegawai_id,status) VALUES (SYSDATE(),'$user','1')";
                mysqli_query($conn,$q);
                $checking="Absen berhasil dilakukan";
            }
            else {
                $checking="Absen masuk sudah dilakukan hari ini";
            }
        }
    }
    $result=["status"=>$checking,"latitude"=>$latitude,"longitude"=>$longitude,"user"=>$user,"distance"=>$distance];
    echo json_encode($result);
?>