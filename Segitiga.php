<?php
require_once "Bentuk2D.php";

class Segitiga extends Bentuk2D{
    public $alas;
    public $tinggi;

    public function __construct($alas, $tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function nama_Bidang(){
        $nama = "Segitiga";
        return $nama;
    }
    public function keliling_Bidang(){
        $keliling = 3 * $this->alas;
        return $keliling;
    }
    public function luas_Bidang(){
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }
    public function keterangan(){
        return "
            Alas : ".$this->alas." <br/>
            Tinggi : ".$this->tinggi." <br/>
        ";
    }
}
?>