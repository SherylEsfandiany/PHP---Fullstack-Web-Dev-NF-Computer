<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>4520210001,'nama'=>'Vino','nilai'=>95];
$m2 = ['nim'=>4520210002,'nama'=>'Zaky','nilai'=>75];
$m3 = ['nim'=>4520210003,'nama'=>'Edria','nilai'=>90];
$m4 = ['nim'=>4520210004,'nama'=>'Sheryl','nilai'=>40];
$m5 = ['nim'=>4520210005,'nama'=>'Esfand','nilai'=>85];
$m6 = ['nim'=>4520210006,'nama'=>'Diany','nilai'=>25];
$m7 = ['nim'=>4520210007,'nama'=>'Putri','nilai'=>59];
$m8 = ['nim'=>4520210008,'nama'=>'Amalia','nilai'=>75];
$m9 = ['nim'=>4520210009,'nama'=>'Queena','nilai'=>100];
$m10 = ['nim'=>4520210010,'nama'=>'Seno','nilai'=>10];

$ar_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];
//array assosiative (> 1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

//aggregate function in array
$jumlah_mhs = count($mahasiswa);
$jml_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2 = $total_nilai / $jumlah_mhs;
//keterangan
$keterangan = [
    'Jumlah Mahasiswa'=>$jumlah_mhs,
    'Total Nilai'=>$total_nilai,
    'Nilai Tertinggi'=>$max_nilai,
    'Nilai Terendah'=>$min_nilai,
    'Rata2'=>$rata2
];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <h3>Daftar Nilai Mahasiswa</h3>
    <table class="table table-striped">
        <thead>
            <?php
            foreach($ar_judul as $jdl){
            ?>
            <th><?= $jdl ?></th>
            <?php } ?>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($mahasiswa as $mhs){
            //set kelulusan
            $kelulusan = ($mhs['nilai']>=60) ? 'lulus' : 'gagal';
            //set grade
            if ($mhs['nilai'] >= 85 && $nilai <= 100) $grade = "A";
            else if($mhs['nilai'] >= 75 && $mhs['nilai'] <= 85) $grade = "B";
            else if($mhs['nilai'] >= 60 && $mhs['nilai'] <= 75) $grade = "C";
            else if($mhs['nilai'] >= 30 && $mhs['nilai'] <= 60) $grade = "D";
            else if($mhs['nilai'] >= 0 && $mhs['nilai'] <= 30) $grade = "E";
            else $grade = "";

            //set predikat
            switch ($grade){
                case "A" : $predikat = "Memuaskan"; break;
                case "B" : $predikat = "Baik"; break;
                case "C" : $predikat = "Cukup"; break;
                case "D" : $predikat = "Kurang"; break;
                case "E" : $predikat = "Buruk"; break;
                default: $predikat = ""; break;
            }
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nilai'] ?></td>
                <td><?= $kelulusan ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        <tfoot>
            <?php
            foreach ($keterangan as $ket => $hasil){
            ?>
            <tr>
                <th colspan="6"><?= $ket ?></th>
                <th><?= $hasil ?></th>
            </tr>
            <?php } ?>
        </tfoot>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>