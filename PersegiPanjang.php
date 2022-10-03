<?php
require_once "Bentuk2D.php";

class PersegiPanjang extends Bentuk2D{
    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function nama_Bidang(){
        $nama = "Persegi Panjang";
        return $nama;
    }
    public function keliling_Bidang(){
        $keliling = (2 * $this->panjang) + (2 * $this->lebar);
        return $keliling;
    }
    public function luas_Bidang(){
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }
    public function keterangan(){
        return "
            Panjang : ".$this->panjang." <br/>
            Lebar : ".$this->lebar."
        ";
    }
}
?>