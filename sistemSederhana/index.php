<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Jadwal Gym</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>CRUD Jadwal Gym</h1>
    <h2>Tambah Jadwal</h2>
    <form action="tambah_jadwal.php" method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama"><br>
        <label>Days:</label><br>
        <input type="date" name="days"><br>
        <label>Sets:</label><br>
        <input type="text" name="sets"><br>
        <label>Reps:</label><br>
        <input type="text" name="reps"><br>
        <input type="submit" value="Tambah Jadwal">
    </form>

    <h2>Ubah Jadwal</h2>
    <form id="form-cari" method="POST">
        <label>Nama Jadwal yang Akan Diubah:</label><br>
        <input type="text" name="name"><br>
        <input type="button" value="Cari" onclick="cariJadwal()">
    </form>

    <div id="ubah-jadwal-form">
        <!-- Di sini akan ditampilkan formulir untuk mengubah jadwal -->
    </div>

    <h2>Hapus Jadwal</h2>
    <form action="hapus_jadwal.php" method="POST">
        <label>Nama Jadwal yang Akan Dihapus:</label><br>
        <input type="text" name="name"><br>
        <input type="submit" value="Hapus Jadwal">
    </form>

    <h2>Daftar Jadwal</h2>
    <?php include 'tampil_jadwal.php'; ?>

    <script>
        function cariJadwal() {
            var name = $("input[name='name']").val();
            $.ajax({
                url: "ubah_jadwal.php",
                type: "POST",
                data: { name: name },
                success: function(response) {
                    $("#ubah-jadwal-form").html(response);
                }
            });
        }
    </script>
</body>
</html>
