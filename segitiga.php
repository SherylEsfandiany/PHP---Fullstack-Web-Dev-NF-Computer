<?php 
require_once "Bentuk2D.php";

class segitiga extends Bentuk2D {

    public $alas;
    public $tinggi;

    public function __construct($alas, $tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang(){
        echo "Segitiga";
    }

    public function sisi(){
        $sisi = sqrt(pow($this->alas,2)+pow($this->tinggi,2));
        return $sisi;
    }

    public function luasBidang(){
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }

    public function kelilingBidang(){
        $keliling = $this->alas + $this->tinggi + $this->sisi();
        return $keliling;
    }

    public function keterangan(){
        echo "Alas : ". $this->alas;
        echo "<br/> Tinggi : ". $this->tinggi;
        echo "<br/> Sisi : ". $this->sisi();
    }
}
?>