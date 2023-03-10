<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tespegawai");

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// jika form disubmit, maka jalankan perintah update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kontrak = $_POST['kontrak'];
    $sql = "UPDATE kontrak SET kontrak='$kontrak' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

// mengambil data user berdasarkan id
$id = $_GET['id'];
$sql = "SELECT * FROM kontrak WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data kontrak</title>
</head>

<body>
    <h1>Edit Data</h1>
    <form action="kontrak.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="kontrak">Nama:</label>
        <input type="text" name="kontrak" value="<?php echo $row['kontrak']; ?>"><br><br>
        <br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>
