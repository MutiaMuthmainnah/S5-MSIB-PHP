
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Latihan Memproses Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <form class="border border-light p-5" method="POST">

            <p class="h4 mb-4 text-center">Form Data Pegawai</p>
            <!-------Nama------->
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control mb-4" placeholder="Nama Pegawai">
            
            <!-------Agama------->
            <label for="agama">Agama</label>
            <select class="browser-default custom-select mb-4" name="agama">
                <option value="" disabled="" selected="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen_protestan">Kristen Protestan</option>
                <option value="Kristen_katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            <br />

            <!-------Jabatan------->
            
            <label for="jabatan">Jabatan</label></br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan1" value="Manager">
                <label class="form-check-label" for="jabatan1">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan2" value="Asisten">
                <label class="form-check-label" for="jabatan2">Asisten</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan3" value="Kabag">
                <label class="form-check-label" for="jabatan3">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan4" value="Staff">
                <label class="form-check-label" for="jabatan4">Staff</label>
            </div>
            </br></br>

            <!-------Status------->
            <label for="status">Status</label></br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Menikah">
                <label class="form-check-label" for="status1">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status2" value="Belum Menikah">
                <label class="form-check-label" for="status2">Belum Menikah</label>
            </div>
            </br></br>

            <!-------Jumlah Anak------->
            <label for="jumlahAnak">Jumlah Anak</label></br>
            <input type="text" name="jumlahAnak" class="form-control mb-4" placeholder="Jumlah Anak">


            
            <button class="btn btn-info btn-block my-4" name="proses" type="submit">Submit</button>

        </form>
        
        <?php 
        error_reporting(0);
        //tangkap request
        $nama = $_POST['nama'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jumlahAnak = $_POST['jumlahAnak'];
        $tombol = $_POST['proses'];

        //tentukan Gaji Pokok
        switch ($jabatan) {
            case 'Manager': $gapok = 20000000; break;
            case 'Asisten': $gapok = 15000000; break;
            case 'Kabag': $gapok = 10000000; break;
            case 'staff': $gapok = 4000000; break;
            default: $gapok ;
        }
        
        //tentukan Tunjangan Keluarga
        if($status == "Menikah" && $jumlahAnak <= 2){
            $tunjangan_keluarga = $gapok * 0.05;
        }else if($status == "Menikah" && $jumlahAnak <= 5){
            $tunjangan_keluarga = $gapok * 0.10;
        }else if($status == "Menikah" && $jumlahAnak > 5){
            $tunjangan_keluarga = $gapok * 0.15;
        }else{
            return "BELUM Mendapat Uang Tunjangan";
        }

        $tunjangan_jabatan = $gapok * 0.2;
        $gaji_kotor = $gapok + $tunjangan_jabatan + $tunjangan_keluarga;
        $zakat = ($agama == "Islam" && $gaji_kotor >= 6000000) ? $gaji_kotor * 0.02 : 0 ;
        $takeHomePay = $gaji_kotor - $zakat;

        if(isset($tombol)){ ?>
        <h3 align="center">Data Pegawai</h3>
            <table align="center" border="1" cellpadding="10">
                <thead border="1">
                    <tr bgcolor="tomato">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>AGAMA</th>
                        <th>JABATAN</th>
                        <th>STATUS</th>
                        <th>JUMLAH ANAK</th>
                        <th>GAJI POKOK</th>
                        <th>TUNJANGAN JABATAN</th>
                        <th>TUNJANGAN KELUARGA</th>
                        <th>GAJI KOTOR</th>
                        <th>ZAKAT PROFESI</th>
                        <th>TAKE HOME PAY</th>
                    </tr>
                </thead>
                <tbody border="1">
                    <tr>
                        <td><?= number_format(1, 2, ',', '.'); ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $agama ?></td>
                        <td><?= $jabatan ?></td>
                        <td><?= $status ?></td>
                        <td><?= $jumlahAnak ?></td> 
                        <td><?= $gapok ?></td> 
                        <td><?= $tunjangan_jabatan ?></td>
                        <td><?= $tunjangan_keluarga ?></td> 
                        <td><?= $gaji_kotor ?></td>
                        <td><?= $zakat ?></td>
                        <td><?= $takeHomePay ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>

</html>