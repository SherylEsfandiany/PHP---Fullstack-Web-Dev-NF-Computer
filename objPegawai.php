<?php
require 'ClassPegawai.php';


$Vino = new Pegawai('4520210001', 'Vino Zaky', 'Manager', 'islam', 'sudah menikah');
$Sheryl = new Pegawai('4520210002', 'Sheryl Esfandiany', 'Asisten Manager', 'Budha', 'sudah menikah');
$Putri = new Pegawai('4520210003', 'Putri Amalia', 'Kepala Bagian', 'Kristen', 'belum menikah');
$Qwinshe = new Pegawai('4520210004', 'Qwinshe Shasha', 'Staff', 'islam', 'belum menikah');
$Seno = new Pegawai('4520210005', 'Seno Akbar', 'Staff', 'islam', 'sudah menikah');

//panggil fungsi
echo '<h2 align="center">'.Pegawai::title.'</h3><br />';
$Vino->mencetak();
$Sheryl->mencetak();
$Putri->mencetak();
$Qwinshe->mencetak();
$Seno->mencetak();
echo 'Jumlah Pegawai : '.Pegawai::$jumlah.' orang';