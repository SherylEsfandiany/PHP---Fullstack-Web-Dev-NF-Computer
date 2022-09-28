<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 2 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
  <div class="container px-5 my-5">
  <h2>Form Perhitungan Gaji</h2>
    <form method="POST">
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap" data-sb-validations="required" />
            <label for="nama">Nama Lengkap</label>
            <div class="invalid-feedback" data-sb-feedback="namaLengkap:required">Nama Lengkap is required.</div>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" name="agama" aria-label="-- Pilih Agama --">
                <option value="Islam">Islam</option>
                <option value="Non Islam">Non Islam</option>
            </select>
            <label for="pilihAgama">-- Pilih Agama --</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block" >Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="manager" type="radio" name="jabatan" id="manager"/>
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="asisten" type="radio" name="jabatan" id="asisten"/>
                <label class="form-check-label" for="asisten">Asisten Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="kabag" type="radio" name="jabatan" id="kabag"/>
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="staff" type="radio" name="jabatan" id="staff"/>
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status Menikah</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="menikah" id="menikah"/>
                <label class="form-check-label" for="sudahMenikah">Sudah Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="belum" id="belum"/>
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="jmlAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" name="proses" type="submit">Simpan</button>
        </div>
    </form>
</div>
<?php 
        //tangkap request
        $nama = $_POST['nama'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['statMenikah'];
        $anak = $_POST['jmlAnak'];
        $tombol = $_POST['proses'];

        //tentukan gaji pokok
        switch ($jabatan) {
            case 'manager': $gapok = 20000000; break;
            case 'asisten': $gapok = 15000000; break;
            case 'kabag': $gapok = 10000000; break;
            case 'staff': $gapok = 4000000; break;
            default: $gapok = '';
        }

        //tentukan tunjangan jabatan
        $tunjab = 0.2 * $gapok;

        //tentukan tunjangan keluarga
        $tunkel = '';
        if($status == 'menikah' && $anak <= 2) {
            $tunkel = 0.05 * $gapok;
        }
        else if($status == 'menikah' && $anak >= 3 && $anak <= 5) {
            $tunkel = 0.1 * $gapok;
        }
        else if($status == 'menikah' && $anak >= 5) {
            $tunkel = 0.15 * $gapok;
        }
        elseif ($status == 'belum' && $anak == 0) {
            $tunjangan_keluarga = 0;
        }

        //tentukan gaji kotor
        $gator = $gapok + $tunjab + $tunkel;

        //tentukan zakat
        $zakat = ($agama == 'islam' && $gator > 6000000) ? 0.25 * $gator : 0;

        //tentukan take home pay
        $thp = $gator - $zakat;

        if(isset($tombol)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Agama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Jumlah Anak</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Keluarga</th>
                    <th>Gaji Kotor</th>
                    <th>Zakat Profesi</th>
                    <th>Take Home Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $nama; ?></td>
                    <td><?= $agama; ?></td>
                    <td><?= $jabatan; ?></td>
                    <td><?= $status; ?></td>
                    <td><?= $anak; ?></td>
                    <td><?= 'Rp.' . number_format($gapok, 2, ',', '.'); ?></td>
                    <td><?= 'Rp.' . number_format($tunjab, 2, ',', '.'); ?></td>
                    <td><?= 'Rp.' . number_format($tunkel, 2, ',', '.'); ?></td>
                    <td><?= 'Rp.' . number_format($gator, 2, ',', '.'); ?></td>
                    <td><?= 'Rp.' . number_format($zakat, 2, ',', '.'); ?></td>
                    <td><?= 'Rp.' . number_format($thp, 2, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>