<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitung IPK/IPS</title>
</head>
<body>
<?php
    session_start();
    $_SESSION['jumlah_matkul'] = $jml_matkul = 0;
    $_SESSION['tipe_nilai'] = $tipe_n = '';
?>
    <form method="get" action="hitung.php">
        <h2>Menghitung IPS/IPK anda</h2>
        <label>Masukkan Jumlah mata kuliah : </label>
        <input type="Number" name="jumlah_matkul" required>
        <label>Tipe Penilaian : </label>
        <select name ="tipe_nilai">
            <option value="num">Nilai angka</option>
            <option value="abjad">Nilai abjad</option>
        </select>
        <input type="submit">
    </form>
</body>
</html>
