<?php
if (isset($_GET['id'])) {
    $idToEdit = $_GET['id'];

    $jsonString = file_get_contents('data.json');

    $data = json_decode($jsonString, true);

    foreach ($data as $key => $project) {
        if ($project['id'] == $idToEdit) {
            $projectToEdit = $project;
            break;
        }
    }
}

if (isset($projectToEdit)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
    </head>

    <body>
        <h1>Edit Data</h1>
        <form action="update_data.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $projectToEdit['id']; ?>">
            <label for="sso">Email SSO:</label>
            <input type="text" id="sso" name="sso" value="<?php echo $projectToEdit['sso']; ?>"><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $projectToEdit['nama']; ?>">
            <br>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo $projectToEdit['nim']; ?>"><br>

            <label for="usn">Username:</label>
            <input type="text" id="usn" name="usn" value="<?php echo $projectToEdit['usn']; ?>"><br>

            <label for="pwd">Password:</label>
            <input type="text" id="pwd" name="pwd" value="<?php echo $projectToEdit['pwd']; ?>"><br>

            <label for="tanggalaktif">Tanggal Aktif:</label>
            <input type="date" id="tanggalaktif" name="tanggalaktif" value="<?php echo $projectToEdit['tanggalaktif']; ?>"><br>

            <label for="stat">Status Bertugas:</label>
            <select id="stat" name="stat" value="<?php echo $projectToEdit['stat']; ?>">
                <option value="Aktif">Aktifkan</option>
                <option value="Non Aktif">Non Aktifkan</option>
            </select><br>
            <button type="submit">Update</button>
        </form>
    </body>

    </html>
<?php
} else {
    echo "Category not found.";
}
?>