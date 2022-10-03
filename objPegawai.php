<?php
require 'pegawai.php'; 
//ciptakan object
$eka = new Pegawai('001','Eka Amelia','Manager', 'Islam', 'Menikah');
$nada = new Pegawai('007','Nada Kamilia','Asmen', 'Islam', 'Menikah');
$bambang = new Pegawai('011','Bambang Triatmaja','Kabag', 'Islam', 'Menikah');
$fikri = new Pegawai('030','Fikri Pratama','Staff', 'Islam', 'Menikah');


echo '<h3 align="center">'.Pegawai::PEGAWAI.'</h3>';
$eka->mencetak();
$nada->mencetak();
$bambang->mencetak();
$fikri->mencetak();

echo 'Jumlah Pegawai: ' . Pegawai::$jml;