<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Mahasiswa</title>
</head>
<body>
    <h1>Saya adalah mahasiswa Program Studi:
    <?php
    if($progdi=="TI")
        echo"Teknik Informatika";
    elseif($progdi=="SI")
        echo"Sistem Informasi";
    elseif($progdi=="IK")
        echo"Ilmu Komunikasi";
    else
        echo"Tidak ada progdi tersebut di fakultas TIK";
    ?>
    </h1>
</body>
</html>