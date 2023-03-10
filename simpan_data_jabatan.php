<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tespegawai");

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// menangkap data yang dikirimkan dari form

$jabatan = $_POST['jabatan'];


// query untuk menyimpan data ke dalam tabel
$sql = "INSERT INTO jabatan (jabatan) VALUES ('$jabatan')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan.";
    header('Location: jabatan.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// menutup koneksi ke database
mysqli_close($conn);
?>
