<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua input tersedia
    if(isset($_POST["name"]) && isset($_POST["days"]) && isset($_POST["sets"]) && isset($_POST["reps"])) {
        // Ambil data dari formulir
        $name = $_POST["name"];
        $days = $_POST["days"];
        $sets = $_POST["sets"];
        $reps = $_POST["reps"];

        // Update data jadwal di database
        $sql = "UPDATE schedule SET Days='$days', Sets='$sets', Reps='$reps' WHERE Name='$name'";

        if (mysqli_query($conn, $sql)) {
            echo "Jadwal berhasil diubah";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Semua input harus diisi.";
    }
} else {
    echo "Metode request tidak valid.";
}

mysqli_close($conn);
?>
