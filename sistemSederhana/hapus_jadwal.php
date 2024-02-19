<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah nilai name sudah tersedia
    if(isset($_POST["name"])) {
        $name = $_POST["name"];
        
        $sql = "DELETE FROM schedule WHERE Name='$name'";

        if (mysqli_query($conn, $sql)) {
            echo "Jadwal berhasil dihapus";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Nama tidak boleh kosong";
    }
} else {
    echo "Metode request tidak valid.";
}

mysqli_close($conn);
?>
