<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah nilai nama yang dikirimkan tidak kosong
    if(isset($_POST["name"]) && !empty($_POST["name"])) {
        $name = $_POST["name"];
        
        // Ambil data jadwal dari database berdasarkan name
        $sql = "SELECT * FROM schedule WHERE Name='$name'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Tampilkan formulir untuk mengubah jadwal dengan nilai yang sudah ada di database
            echo '<form action="proses_ubah_jadwal.php" method="POST">';
            echo '<input type="hidden" name="name" value="' . $row["Name"] . '"><br>';
            echo '<label>Days Baru:</label><br>';
            echo '<input type="date" name="days" value="' . $row["Days"] . '"><br>';
            echo '<label>Sets Baru:</label><br>';
            echo '<input type="text" name="sets" value="' . $row["Sets"] . '"><br>';
            echo '<label>Reps Baru:</label><br>';
            echo '<input type="text" name="reps" value="' . $row["Reps"] . '"><br>';
            echo '<input type="submit" value="Ubah Jadwal">';
            echo '</form>';
        } else {
            echo "Jadwal tidak ditemukan";
        }
    } else {
        echo "Name tidak boleh kosong"; // Jika nilai nama kosong, tampilkan pesan kesalahan
    }
} else {
    echo "Metode request tidak valid.";
}

mysqli_close($conn);
?>
