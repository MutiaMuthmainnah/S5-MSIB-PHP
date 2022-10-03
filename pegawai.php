<?php
class Pegawai{
    //member1 variabel
    protected $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;

    //variabel konstanta & static di dlm class
    static $jml = 0;
    const PEGAWAI = 'Data Pegawai';
    
    //member2 konstruktor
    public function __construct($nip, $pegawai, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $pegawai;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }

    //member3 method2
    public function setGaji_pokok(){
        if ($this->jabatan == 'Manager') $gapok = 15000000;
        else if ($this->jabatan == 'Asisten Manager') $gapok = 10000000;
        else if ($this->jabatan == 'Kabag') $gapok = 7000000;
        else if ($this->jabatan == 'Staff') $gapok = 4000000;
        else $gapok = 0;

        return $gapok;
    }
    public function setTunjab(){
        $tunjab = $this->setGaji_pokok() * 0.2;
        return $tunjab;
    }
    public function setTunkel(){
        $tunkel = ($this->status == 'Menikah') ? $this->setGaji_pokok() * 0.1 : 0;
        return $tunkel;
    }
    public function setGaji_kotor(){
        $gaji_kotor = $this->setGaji_pokok() + $this->setTunjab() + $this->setTunkel();
        return $gaji_kotor;
    }
    public function setZakat(){
        $zakat = ($this->agama == "Islam" && $this->setGaji_kotor() >= 6000000) ? $this->setGaji_kotor() * 0.025 : 0 ;
        return $zakat;
    }

    public function mencetak(){
        echo '<b><u>'.self::PEGAWAI.'</u></b>'; 
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>Agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br>Gaji Pokok: Rp ' . number_format($this->setGaji_pokok(), 0, ',', '.');
        echo '<br>Tunjangan Jabatan: Rp ' . number_format($this->setTunjab(), 0, ',', '.');
        echo '<br>Tunjangan Keluarga: Rp ' . number_format($this->setTunkel(), 0, ',', '.');
        echo '<br>Zakat Profesi: Rp ' . number_format($this->setZakat(), 0, ',', '.');
        echo '<hr/>';
    }
}