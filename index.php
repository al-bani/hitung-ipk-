<?php  require 'config.php';

    if (isset($_POST["submit"])){
        $pil = $_POST["choose"];

        $_SESSION['tipe'] = $pil;
        if(!empty($pil)){
            $_SESSION['tipe'] = $pil;
            header("Location: input.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung IPK dan IPS anda</title>
</head>
<body>
    <div class="form">
    <form method="post">
        <h2>PILIH SALAH SATU YANG AKAN DI HITUNG</h2>
        <select name="choose">
            <option value="ipk">HITUNG IPK</option>
            <option value="ips">HITUNG IPS</option>
        </select>
        <input type="submit" name="submit" value="submit">
</div>
</body>
</html>