<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kumpulan Bentuk</title>
</head>
<body>
    <?php
    require_once "Lingkaran.php";
    require_once "PersegiPanjang.php";
    require_once "Segitiga.php";
    $arrayJudul = ["No", "Bidang", "Keterangan", "Luas Bidang", "Keliling Bidang"];
    ?>
    <table border="1">
        <thead>
            <tr>
                <?php
                foreach($arrayJudul as $judul){ ?>
                    <th> <?=$judul?> </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $persegipanjang = new PersegiPanjang(10, 5);
            $lingkaran = new lingkaran(16);
            $segitiga = new segitiga(12,12);

            $arrayBentuk = [$persegipanjang, $lingkaran, $segitiga];
            $no = 1;
            foreach ($arrayBentuk as $bentuk){
                $namaBidang = $bentuk->nama_Bidang();
                $keterangan = $bentuk->keterangan();
                $luasBidang = $bentuk->luas_Bidang();
                $kelilingBidang = $bentuk->keliling_Bidang();
            
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $namaBidang ?></td>
                <td><?= $keterangan ?></td>
                <td><?= $luasBidang ?></td>
                <td><?= $kelilingBidang ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>