<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        body {
            background-color: #77815C;
        }

        h1 {
            color: white;
        }

        .tabel {
            background-color: #9DC183; 
            border-collapse: collapse;
            width: 100%;
        }

        .tabel td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .tabel tr:nth-child(odd) {
            background-color: #ffffff; 
        }

        .tabel tr:nth-child(even) {
            background-color: #9DC183; 
            color : #ffffff;
        }
        
    </style>
</head>
<body>
    <?php
    $nama = "Maysarah";
    $usia = "20 Tahun";
    $domisili = "Banjarmasin, Kalimantan Selatan";
    $kampus = "Universitas Lambung Mangkurat";
    $fakultas = "Fakultas Keguruan dan Ilmu Pendidikan";
    $prodi = "Pendidikan Komputer";
    $mitra_sib = "PT GITS Indonesia";
    $angkatan_msib = "MSIB Batch 5";
    $hobi = "Mendengarkan Musik";
    ?>

    <h1 align="center">BIODATA DIRI</h1>
    <div class="container mt-3">
        <div class="row">
            <!-- <div class="col-md-10"> -->
                <table class="tabel">
                <tr>
                    <td>Nama</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td><?php echo $usia; ?></td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td><?php echo $domisili; ?></td>
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td><?php echo $kampus; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td><?php echo $fakultas; ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><?php echo $prodi; ?></td>
                </tr>
                <tr>
                    <td>Mitra SIB</td>
                    <td><?php echo $mitra_sib; ?></td>
                </tr>
                <tr>
                    <td>Angkatan MSIB</td>
                    <td><?php echo $angkatan_msib; ?></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td><?php echo $hobi; ?></td>
                </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>