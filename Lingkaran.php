<?php
require_once "Bentuk2D.php";

class Lingkaran extends Bentuk2D{
    public $jari2;
    const PHI = 3.14;

    public function __construct($jari2){
        $this->jari2 = $jari2;
    }

    public function nama_Bidang(){
        $nama = "Lingkaran";
        return $nama;
    }
    public function keliling_Bidang(){
        $keliling = Lingkaran::PHI * 2 * $this->jari2;
        return $keliling;
    }
    public function luas_Bidang(){
        $luas = Lingkaran::PHI * pow($this->jari2, 2);
        return $luas;
    }
    public function keterangan(){
        return "
            Jari-jari : ".$this->jari2." <br/>
        ";
    }
}
?>