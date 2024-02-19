<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nama"];
    $days = !empty($_POST["days"]) ? date('Y-m-d', strtotime($_POST["days"])) : null;
    $sets = !empty($_POST["sets"]) ? $_POST["sets"] : null;
    $reps = !empty($_POST["reps"]) ? $_POST["reps"] : null;

    // Jika nama tidak kosong, tambahkan data ke database
    if (!empty($name)) {
        $sql = "INSERT INTO schedule (Name, Days, Sets, Reps) VALUES ('$name', ";

        // Menggabungkan nilai yang tidak null ke dalam pernyataan SQL
        if ($days !== null) {
            $sql .= "'$days', ";
        } else {
            $sql .= "null, ";
        }
        if ($sets !== null) {
            $sql .= "'$sets', ";
        } else {
            $sql .= "null, ";
        }
        if ($reps !== null) {
            $sql .= "'$reps')";
        } else {
            $sql .= "null)";
        }

        if (mysqli_query($conn, $sql)) {
            echo "Jadwal berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Name tidak boleh kosong";
    }
} else {
    echo "Metode request tidak valid.";
}

mysqli_close($conn);
?>
