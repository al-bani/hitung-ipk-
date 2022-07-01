<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung IPK/IPS</title>
</head>
<body>

<?php
    session_start();
    $jml_matkul = 0;
    $jml_matkul = $_GET['jumlah_matkul'];
    $bobot = [];
    $nm_matkul = [];

    if ($jml_matkul == 0 and $jml_matkul == NULL and $jml_matkul < 0){
        echo "ERROR : anda belum memasukkan nilai Matakuliah !";
    }

    if(isset($_POST['kirim'])){
        $jml_sks = $_POST['jumlah_sks'];
        $nm_matkul[] = $_POST['nama_matkul'];
 
    foreach($_POST['nilai_matkul'] as $i => $nilai){
        if ($nilai == 'A'){
            $A = 4;
            $bobot[$i] = $jml_sks[$i]*$A;
        } else if ($nilai == 'AB'){
            $AB = 3.5;
            $bobot[$i] = $jml_sks[$i]*$AB;
        } else if ($nilai == 'B'){
            $B = 3;
            $bobot[$i] = $jml_sks[$i]*$B;
        } else if ($nilai == 'BC'){
            $BC = 2.5;
            $bobot[$i] = $jml_sks[$i]*$BC;
        } else if ($nilai == 'C'){
            $C = 2;
            $bobot[$i] = $jml_sks[$i]*$C;
        } else if ($nilai == 'D'){
            $D = 1;
            $bobot[$i] = $jml_sks[$i]*$D;
        } else if ($nilai == 'E'){
            $E = 0;
            $bobot[$i] = $jml_sks[$i]*$B;
        }
    }

    $total_bobot = 0;
    $total_sks = 0;

    foreach($bobot as $key => $bbt){
        $total_bobot += $bbt;
        $total_sks += $jml_sks[$key];
    }

    (float) $IP = $total_bobot/$total_sks;

    if ($IP > 3.00){
        $sks_diambil = 24;
    } else  if ($IP <= 3.00 and $IP > 2.00){
        $sks_diambil = 20;
    } else  if ($IP <= 2.00){
        $sks_diambil = 18;
    }

}
?>

    <div class="form">
    <form method="post" action="hitung.php?jumlah_matkul=<?php echo $jml_matkul?>">
    
        <?php $j =0; for($i = 0; $i < $jml_matkul; $i++){
              ?>

            <label>   Mata kuliah ke-<?php echo $j+1?> : </label>
            <input type="text" name='nama_matkul[]' placeholder="input nama matakuliah">
            <label>   Jumlah SKS : </label>
            <input type="number" name='jumlah_sks[]' placeholder="input jumlah SKS" required>
            <label>   Nilai : </label>
            <select name='nilai_matkul[]'>
    		    <option value="A" >A</option>
                <option value="AB" >AB</option>
	    	    <option value="B" >B</option>
                <option value="BC" >BC</option>
                <option value="C" >C</option>
		        <option value="D" >D</option>
                <option value="E" >E</option>				
	        </select>
        <br></br>
        <?php $j++; } ?>
        </br><input type="submit" name="kirim" value="Hitung"  <?php if ($jml_matkul == 0){  echo "hidden='hidden'"; } ?>

        <?php if(isset($_POST['kirim'])){ ?>
            <h3><?php  echo "IPK/IPS anda : ".round((float)$IP,2); ?></h3>
            <h3><?php  echo "SKS yang bisa diambil : $sks_diambil SKS"; ?></h3>
            <p><a href="https://alcupu.carrd.co/"> © : alcupu itu siapah</a></p>
        <?php } ?>

    </div>
    <p><a href="index.php">kembali</a>
</body>
</html>
