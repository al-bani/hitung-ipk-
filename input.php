<?php  require 'config.php';
    $_SESSION['jumlah_matkul'] = 0;
    $_SESSION['tipe_nilai'] = '';

    $_SESSION['jumlah_semester'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input data</title>
</head>
<body>

<?php if ($_SESSION['tipe'] == "ips") { ?>
    <form method="get" action="ips.php">
        <h2>Menghitung IPS anda</h2>
        <label>Masukkan Jumlah mata kuliah : </label>
        <input type="Number" name="jumlah_matkul" min="1" max="200" required>
        <label>Tipe Penilaian : </label>
        <select name ="tipe_nilai">
            <option value="num">Nilai angka</option>
            <option value="abjad">Nilai abjad</option>
        </select>
        <input type="submit">
    </form>

<?php } else if ($_SESSION['tipe'] == "ipk"){ ?>
    <form method="get" action="ipk.php">
        <h2>Menghitung IPK anda</h2>
        <label>Masukkan Jumlah semester : </label>
        <input type="Number" name="jumlah_semester" max="14" min="1" required>
        <input type="submit">
    </form>
<?php } ?>
</body>
</html>
