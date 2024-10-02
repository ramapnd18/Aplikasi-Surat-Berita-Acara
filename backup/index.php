<html>
<head>
    <title>From Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <link rel="shortcut icon" href="img/logo_bapenda1.png">
</head>
<body style="background-image: url('img/background.jpg');">
    
    <?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='text-bg-danger p-3' style='text-align: center;'>Username dan Password tidak sesuai !</div>";
    }else if ($_GET['pesan'] == "login") {
        echo "<div class='text-bg-primary p-3' style='text-align: center;'>Silahkan Login Terlebih dahulu</div>";
    }
}

?>
    <center class="" style="font-size: 2rem; font-weight: 800; margin: 150px 0px 50px 0px; color:white;">Silahkan Masuk</center>
    <div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width:300px; margin: auto;">
        
        <form action="cek_login.php" method="post">
        <label class="form-label">Nama Pengguna</label>
        <input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required="required">
        <label class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="required">
        <div class="d-grid gap-2">
        <input type="submit" class="btn btn-success" value="Login" style="margin-top: 10px;"></div>
        </form>
    </div>
</body>
</html>