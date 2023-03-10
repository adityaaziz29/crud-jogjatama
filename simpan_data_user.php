<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tespegawai");

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// menangkap data yang dikirimkan dari form
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$kontrak = $_POST['kontrak'];

// query untuk menyimpan data ke dalam tabel
$sql = "INSERT INTO user (name, id_kontrak, id_jabatan) VALUES ('$nama', '$kontrak', '$jabatan')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan.";
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// menutup koneksi ke database
mysqli_close($conn);
?>
