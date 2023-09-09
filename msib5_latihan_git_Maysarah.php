<?php
$host = "localhost";
$username = "root";
$password = "maysarah18";
$database = "db_biodata";

$koneksi = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Proses form jika data dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $domisili = $_POST["domisili"];
    $kampus = $_POST["kampus"];
    $fakultas = $_POST["fakultas"];
    $prodi = $_POST["prodi"];
    $mitra_sib = $_POST["mitra_sib"];
    $angkatan_msib = $_POST["angkatan_msib"];
    $hobi = $_POST["hobi"];

    if (isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $sql = "UPDATE biodata SET
                nama = '$nama',
                usia = '$usia',
                domisili = '$domisili',
                kampus = '$kampus',
                fakultas = '$fakultas',
                prodi = '$prodi',
                mitra_sib = '$mitra_sib',
                angkatan_msib = '$angkatan_msib',
                hobi = '$hobi'
                WHERE id = $edit_id";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil diubah";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $sql = "DELETE FROM biodata WHERE id = $delete_id";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil dihapus";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        $sql = "INSERT INTO biodata (nama, usia, domisili, kampus, fakultas, prodi, mitra_sib, angkatan_msib, hobi)
                VALUES ('$nama', '$usia', '$domisili', '$kampus', '$fakultas', '$prodi', '$mitra_sib', '$angkatan_msib', '$hobi')";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
}

?>

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
    <h1 align="center">BIODATA DIRI</h1>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia</label>
                        <input type="text" class="form-control" id="usia" name="usia" required>
                    </div>
                    <div class="mb-3">
                        <label for="domisili" class="form-label">Domisili</label>
                        <input type="text" class="form-control" id="domisili" name="domisili" required>
                    </div>
                    <div class="mb-3">
                        <label for="kampus" class="form-label">Asal Kampus</label>
                        <input type="text" class="form-control" id="kampus" name="kampus" required>
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" required>
                    </div>
                    <div class="mb-3">
                        <label for="mitra_sib" class="form-label">Mitra SIB</label>
                        <input type="text" class="form-control" id="mitra_sib" name="mitra_sib" required>
                    </div>
                    <div class="mb-3">
                        <label for="angkatan_msib" class="form-label">Angkatan MSIB</label>
                        <input type="text" class="form-control" id="angkatan_msib" name="angkatan_msib" required>
                    </div>
                    <div class="mb-3">
                        <label for="hobi" class="form-label">Hobi</label>
                        <input type="text" class="form-control" id="hobi" name="hobi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Tampilkan data dari database -->
                <table class="tabel">
                    <tr>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Domisili</th>
                        <th>Asal Kampus</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th>Mitra SIB</th>
                        <th>Angkatan MSIB</th>
                        <th>Hobi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM biodata";
                    $result = mysqli_query($koneksi, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["usia"] . "</td>";
                        echo "<td>" . $row["domisili"] . "</td>";
                        echo "<td>" . $row["kampus"] . "</td>";
                        echo "<td>" . $row["fakultas"] . "</td>";
                        echo "<td>" . $row["prodi"] . "</td>";
                        echo "<td>" . $row["mitra_sib"] . "</td>";
                        echo "<td>" . $row["angkatan_msib"] . "</td>";
                        echo "<td>" . $row["hobi"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action=''>";
                        echo "<input type='hidden' name='edit_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn btn-warning btn-sm'>Edit</button>";
                        echo " ";
                        echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>