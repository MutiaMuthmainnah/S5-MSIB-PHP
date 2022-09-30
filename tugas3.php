<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>'0110220011','nama'=>'Eka','nilai'=> 60];
$m2 = ['nim'=>'0110220022','nama'=>'Farah','nilai'=> 50];
$m3 = ['nim'=>'0110220033','nama'=>'Satria','nilai'=> 45];
$m4 = ['nim'=>'0110220044','nama'=>'Bambang','nilai'=> 90];
$m5 = ['nim'=>'0110220055','nama'=>'Fikri','nilai'=> 100];
$m6 = ['nim'=>'0110220066','nama'=>'Nada','nilai'=> 80];
$m7 = ['nim'=>'0110220077','nama'=>'Mutia','nilai'=> 85];
$m8 = ['nim'=>'0110220088','nama'=>'Kayla','nilai'=> 60];
$m9 = ['nim'=>'0110220099','nama'=>'Azzam','nilai'=> 65];
$m10 = ['nim'=>'0110220010','nama'=>'Arip','nilai'=> 55];

$ar_judul = ['No','Nim','Nama','Nilai','Grade',
'Predikat','Keterangan'];

//array assosiative (> 1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6, $m7, $m8, $m9, $m10];

//aggregate function in array
$jml_mahasiswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2 = $total_nilai / $jml_mahasiswa;
//keterangan
$keterangan = [
    'Jumlah Mahasiswa'=>$jml_mahasiswa,
    'Total Nilai'=>$total_nilai,
    'Jml Nilai Tertinggi'=>$max_nilai,
    'Jml Nilai Terendah'=>$min_nilai,
    'Rata2'=>$rata2
];
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Belajar Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <h3 class="text-center">Daftar Nilai Mahasiswa</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php
                    foreach($ar_judul as $jdl){
                    ?>
                    <th><?= $jdl ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>

                <?php

                $no = 1;
                foreach($mahasiswa as $mhs){
                //tentukan kelulusan
                $ket = ($mhs['nilai'] >= 60)?"Lulus":"Gagal";
                //tentukan grade nilai
                if($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
                else if($mhs['nilai'] >= 75 && $mhs['nilai'] < 85) $grade = 'B';
                else if($mhs['nilai'] >= 60 && $mhs['nilai'] < 75) $grade = 'C';
                else if($mhs['nilai'] >= 30 && $mhs['nilai'] < 60) $grade = 'D';
                else if($mhs['nilai'] >= 0 && $mhs['nilai'] < 30) $grade = 'E';
                else $grade = '';
                //tentukan predikat
                switch ($grade) {
                    case 'A': $predikat = 'Memuaskan'; break;
                    case 'B': $predikat = 'Bagus'; break;
                    case 'C': $predikat = 'Cukup'; break;
                    case 'D': $predikat = 'Kurang'; break;
                    case 'E': $predikat = 'Buruk'; break;
                    default: $predikat = '';
                }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                    <td><?= $ket ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
                <?php
                foreach ($keterangan as $ker => $hasil) {
                ?>
                <tr>
                    <th colspan="6"><?= $ker ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>
</html>
