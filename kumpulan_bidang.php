<?php
require_once "lingkaran.php";
require_once "persegipanjang.php";
require_once "segitiga.php";

$lingkaran = new lingkaran(13);
$persegi = new persegipanjang(28, 15);
$segitiga = new segitiga(21, 2);

$title = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Badan'];
$bidang_bidang = [$lingkaran, $persegi, $segitiga];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Pertemuan 5 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <div class="container-md">
        <h1 class="text-center my-3">Data Bidang</h1>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <?php foreach($title as $tl){ ?>
                                <th><?= $tl ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                            $no = 1;
                            foreach($bidang_bidang as $bidang){
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $bidang->namaBidang() ?></td>
                                <td><?= $bidang->keterangan() ?></td>
                                <td><?= $bidang->luasBidang() ?></td>
                                <td><?= $bidang->kelilingBidang() ?></td>
                            </tr>
                            <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>