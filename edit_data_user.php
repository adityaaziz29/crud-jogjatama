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
    $name = $_POST['name'];
    $id_kontrak = $_POST['id_kontrak'];
    $id_jabatan = $_POST['id_jabatan'];
    $sql = "UPDATE user SET name='$name', id_kontrak='$id_kontrak', id_jabatan='$id_jabatan' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

// mengambil data user berdasarkan id
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// mengambil data kontrak dari database
$sql_kontrak = "SELECT * FROM kontrak";
$result_kontrak = mysqli_query($conn, $sql_kontrak);

// mengambil data jabatan dari database
$sql_jabatan = "SELECT * FROM jabatan";
$result_jabatan = mysqli_query($conn, $sql_jabatan);

// menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <h1>Edit Data</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Nama:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        <label for="id_kontrak">Kontrak:</label>
        <select name="id_kontrak">
            <?php
            while ($row_kontrak = mysqli_fetch_assoc($result_kontrak)) {
                $selected = ($row_kontrak['id'] == $row['id_kontrak']) ? 'selected' : '';
                echo "<option value='" . $row_kontrak['id'] . "' " . $selected . ">" . $row_kontrak['kontrak'] . "</option>";
            }
            ?>
        </select><br><br>
        <label for="id_jabatan">Jabatan:</label>
        <select name="id_jabatan">
            <?php
            while ($row_jabatan = mysqli_fetch_assoc($result_jabatan)) {
                $selected = ($row_jabatan['id'] == $row['id_jabatan']) ? 'selected' : '';
                echo "<option value='" . $row_jabatan['id'] . "' " . $selected . ">" . $row_jabatan['jabatan'] . "</option>";
            }
            ?>
        </select><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>
