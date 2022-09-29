<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
<label for="nis">Nomor Induk Siswa :</label>
<input type="number" name="nis" placeholder="Ex. 12003102" /><br>

<label for="nama">Nama Lengkap :</label>
<input type="text" name="nama" placeholder="Ex. Nurul hamidah" /><br>

<label for="tanggal_lahir">Tanggal Lahir :</label>
<input type="date" name="tanggal_lahir" /><br>

<label for="nilai">Nilai : </label><br>
<input type="number" name="nilai" placeholer="Ex. 80.56" />

<input type="submit" name="simpan" value="Simpan Data" />
<a href="input-datadiri.php">Kembali</a>
</form>

<?php
include ('./input-config.php');
if ($_SESSION["login"] != TRUE) {
    header('location:login.php');

}
if ($_SESSION["role"] != "admin") {
    echo "
    <script>
         alert('Akses tidak diberikan, kamu bukan admin');
         window.location='input-datadiri.php';
         </script>
    ";
    }

 if(isset($_POST["simpan"])){
     $nis = $_POST["nis"];
     $nama = $_POST["nama"];
     $tanggal_lahir = $_POST["tanggal_lahir"];
     $nilai = $_POST["nilai"];

    echo $nis . "<br>";
    echo $nama . "<br>";
    echo $tanggal_lahir . "<br>";
    echo $nilai . "<br>";

    // CREATE - Menambahkan Data ke Database
    $query = "
        INSERT INTO datadiri2 VALUES
        ('$nis', '$nama', '$tanggal_lahir', '$nilai');
    ";
    echo $query;
    $insert = mysqli_query($mysqli, $query);

    if ($insert){
        echo "
        <script>
         alert('Data berhasil ditambahkan');
         window.location='input-datadiri.php';
         </script>
        ";
    }
}
?>