<?php
include 'koneksi.php';

$sql = "SELECT * FROM schedule";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["Name"]. " - Days: " . $row["Days"]. " - Sets: " . $row["Sets"]. " - Reps: " . $row["Reps"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
