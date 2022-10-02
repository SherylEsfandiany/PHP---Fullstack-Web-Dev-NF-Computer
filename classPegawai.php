<?php 

class Pegawai{

    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;

    static $jumlah = 0;
    const title = 'CV. Putri Amalia Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jumlah++;
    }

    public function GajiPokok($jabatan){
        $this->jabatan = $jabatan;
        //gaji pokok
        switch ($jabatan) {
            case 'Manager':
                $gaji_pokok = 15000000;
                break;
            case 'Asisten Manager':
                $gaji_pokok = 10000000;
                break;
            case 'Kepala Bagian':
                $gaji_pokok = 7000000;
                break;
            case 'Staff':
                $gaji_pokok = 4000000;
                break;
        }
        return $gaji_pokok;
    }

    public function TunjanganJabatan(){
        $tunjangan_jabatan = 0.2 * $this->GajiPokok($this->jabatan);
        return $tunjangan_jabatan;
    }

    public function TunjanganKeluarga($status){
        $this->status = $status;

        $tunjangan_keluarga = ($status == 'sudah menikah') ? 0.1 * $this->GajiPokok($this->jabatan) :0 ;
        return $tunjangan_keluarga;
    }

    public function GajiKotor(){
        $gaji_kotor = $this->GajiPokok($this->jabatan) + $this->TunjanganJabatan() + $this->TunjanganKeluarga($this->status);
        return $gaji_kotor;
    }

    public function ZakatProfesi($agama){
        $this->agama = $agama;

        $zakat = ($agama == 'islam' && $this->GajiKotor() >= 6000000) ? 0.025 * $this->GajiPokok($this->jabatan) : 0;
        return $zakat;
    }

    public function GajiBersih(){
        $gaji_bersih = $this->GajiKotor() - $this->ZakatProfesi($this->agama);
        return $gaji_bersih;
    }

    public function mencetak(){

        echo 'NIP Pegawai : ' . $this->nip;
        echo '<br />Nama Pegawai : ' . $this->nama;
        echo '<br />Jabatan : ' . $this->jabatan;
        echo '<br />Agama : ' . $this->agama;
        echo '<br />Status : ' . $this->status;
        echo '<br />Gaji Pokok : Rp. ' . number_format($this->GajiPokok($this->jabatan), 0, ',', '.');
        echo '<br />Tunjangan Jabatan : Rp. ' . number_format($this->TunjanganJabatan(), 0, ',', '.');
        echo '<br />Tunjangan Keluarga : Rp. ' . number_format($this->TunjanganKeluarga($this->status), 0, ',', '.');
        echo '<br />Zakat Profesi : Rp. ' . number_format($this->ZakatProfesi($this->agama), 0, ',', '.');
        echo '<br />Gaji Bersih : Rp. ' . number_format($this->GajiBersih(), 0, ',', '.');
        echo '<hr /><br />';
    }

}

?>