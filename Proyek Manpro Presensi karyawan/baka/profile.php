<?php
    include "../conn.php";
    $user=$_SESSION["user"];
    $q="SELECT * FROM pegawai WHERE id='".$user["id"]."'";
    $res=mysqli_query($conn,$q);
    $data=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/layout.css">
    <style>
        .row {
            padding-top: 10px;
        }
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-left: 49%;
            margin-top: 20px;
            margin-bottom: 40px;
        }
    </style>

    <script type="text/javascript">
        function button_alert() {
            alert("Data telah berhasil diubah");
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../Foto/UKP.png">
            </div>
            <ul class="list-unstyled components">
                <p style="opacity: 60%;">DASHBOARD</p>
                <li>
                    <a href="./home.html">Home</a>
                </li>
                <li>
                    <a href="./profile.php">Profile</a>
                </li>
                <li>
                    <a href="./dataAbsensi.php">Data Absensi</a>
                </li>
                <li>
                    <a href="./pengajuanCuti.php">Pengajuan Ijin Cuti</a>
                </li>
            </ul>
            <a href="../login.php">
                <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-top: 170px;">LOG OUT</button>
            </a>
        </nav>
    </div>
    <div class="container" style="padding-top: 20px;">
        <form action="updateprofile.php" method="POST">
            <img src="../Foto/UKP.png" alt="Avatar" class="avatar">
            <div class="card shadow mb-4" style="width: 113%; padding: 5px 20px 10px 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h5>Email</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="email" value="<?php echo $data["email"];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>Nomor Telepon</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="nomorTlp" value="<?php echo $data["nomor telepon"];?>">
                        </div>
                    </div>
                    <a href="#">
                        <button class="btn btn-primary" style="margin-top: 30px; margin-left: 45%;" onclick="button_alert()">Simpan</button>
                    </a>
                </div>
            </div>
        </form>
        <div class="footer">
            <p><b>@ 2022 All Rights Reserved by Universitas Kristen Petra</b></p>
        </div>
    </div>
</body>
</html>