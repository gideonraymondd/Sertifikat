<?php
    include "conn.php";
?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('Foto/halamanlogin.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            text-align: center;
        }
        .container {
            background-color: white;
            border-radius: 20px;
            padding: 25px;
            width: 40%;
        }
        .form-group {
            width: 100%;
            padding: 5px;
        }
        input {
            text-align: center;
        }
        button[type = submit] {
            background-color: rgb(0, 0, 102);
            color: white;
            width: 98%;
            padding: 5px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: white;
            padding: 15px 0px 0px 15px;
            text-align: left;
        }
        #dropdownMenuButton {
            background-color: white;
            color: grey;
            border: none;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <img src="Foto/UKP.png" style="width: 12%; margin: 30px 0px 30px;">
    <div class="container  bg-primary">
        <?php
            $warning=getget("warning");
            if ($warning!="")
            {
                ?>
                    <div class="alert alert-warning">
                        <?php
                            echo $warning;
                        ?>
                    </div>
                <?php
            }
        ?>
        <form action="action/checklogin.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
    <div class="footer">
        <p><b>@ 2022 All Rights Reserved by Universitas Kristen Petra</b></p>
    </div>
</body>