<?php require 'config.php';
    $jml_smt = $_GET['jumlah_semester'];

    if (empty($_GET['jumlah_semester'])){
        header("Location: error.php");
    }

    if (isset($_POST['submit'])){
        $_POST['nilai_ips'] = str_replace(',', '.',  $_POST['nilai_ips']);
        $n_ips = $_POST['nilai_ips'];

        $total = 0;

        foreach ($n_ips as $i => $nilai) {
            $total += $nilai;
        }
    
        $IPK = $total/$jml_smt;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitung IPK</title>
</head>
<body>
    <div class="form">
        <form action="ipk.php<?php echo "?jumlah_semester=$jml_smt"?>" method="post" autocomplete="off">
                <h2>Hitung IPK dari nilai IPS</h2>
            <?php $j = 0; for ($i = 0; $i < $jml_smt; $i++): ?>
                <label for="ips">Nilai IPS semester ke-<?php echo $j+1 ?> : </label>
                <input type="float" name="nilai_ips[]" require>
                <br>
                </br>
            <?php $j++; endfor; ?>
            <br>
            <input type="submit" name="submit" value="hitung">

        <?php if(isset($_POST['submit'])): ?>
            <h3><?php echo "IPK anda : ".round((float)$IPK,2); ?></h3>
            <p><a href="https://alcupu.carrd.co/"> © : alcupu itu siapah</a></p>
        <?php endif; ?>
        </form>
    </div>
    <p><a href="input.php">kembali</a>
</body>
</html>