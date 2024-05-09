<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Asprak</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Data Asisten Praktikum</h1>
    <a href="#" id="tambahDataLink">Tambah Data</a>

    <div id="tambahDataForm" style="display: none;">
        <form id="kategoriForm">
            <label for="sso">Email SSO:</label>
            <input type="text" id="sso" name="sso" required><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required><br>

            <label for="usn">Username:</label>
            <input type="text" id="usn" name="usn" required><br>

            <label for="pwd">Password:</label>
            <input type="text" id="pwd" name="pwd" required><br>

            <label for="tanggalaktif">Tanggal Aktif:</label>
            <input type="date" id="tanggalaktif" name="tanggalaktif" required><br>

            <label for="stat">Status:</label>
            <select id="stat" name="stat" required>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktifkan</option>
            </select><br>

            <button type="submit">Tambah</button>
        </form>
    </div>

    <table border="1" cellspacing="0" id="kategoriTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email SSO</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Username</th>
                <th>Password</th>
                <th>Tanggal Aktif</th>
                <th>Status Bertugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayKategori() {
                $.getJSON("data.json", function(data) {
                    $("#kategoriTable tbody").empty();

                    $.each(data, function(index, project) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + project.id + "</td>");
                        newRow.append("<td>" + project.sso + "</td>");
                        newRow.append("<td>" + project.nama + "</td>");
                        newRow.append("<td>" + project.nim + "</td>");
                        newRow.append("<td>" + project.usn + "</td>");
                        newRow.append("<td>" + project.pwd + "</td>");
                        newRow.append("<td>" + project.tanggalaktif + "</td>");
                        newRow.append("<td>" + project.stat + "</td>");
                        newRow.append("<td><a href='edit_data.php?id=" + project.id + "'>Ubah</a> <a href='hapus_data.php?id=" + project.id + "'>Hapus</a></td>");
                        $("#kategoriTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayKategori();

            $("#tambahDataLink").click(function() {
                $("#tambahDataForm").toggle();
            });

            $("#kategoriForm").submit(function(event) {
                event.preventDefault();
                var sso = $("#sso").val();
                var nama = $("#nama").val();
                var nim = $("#nim").val();
                var usn = $("#usn").val();
                var pwd = $("#pwd").val();
                var tanggalaktif = $("#tanggalaktif").val();
                var stat = $("#stat").val();

                $.ajax({
                    url: "input.php",
                    method: "POST",
                    data: {
                        sso: sso,
                        nama: nama,
                        nim: nim,
                        usn: usn,
                        pwd: pwd,
                        tanggalaktif: tanggalaktif,
                        stat: stat
                    },
                    success: function(response) {
                        fetchAndDisplayKategori();
                        $("#tambahDataForm").hide();
                    }
                });
            });
        });
    </script>
</body>

</html>
