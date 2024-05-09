<?php
if (isset($_POST['sso'], $_POST['nama'], $_POST['nim'],$_POST['usn'],$_POST['pwd'], $_POST['tanggalaktif'], $_POST['stat'])) {
    $jsonData = file_get_contents('data.json');

    $dataArray = json_decode($jsonData, true);

    $newsso = $_POST['sso'];
    $newnama = $_POST['nama'];
    $newnim = $_POST['nim'];
    $newusn = $_POST['usn'];
    $newpwd = $_POST['pwd'];
    $newtanggalaktif = $_POST['tanggalaktif'];
    $newstat = $_POST['stat'];

    $newEntry = array(
        'id' => count($dataArray) + 1,
        'sso' => $newsso,
        'nama' => $newnama,
        'nim' => $newnim,
        'usn' => $newusn,
        'pwd' => $newpwd,
        'tanggalaktif' => $newtanggalaktif,
        'stat' => $newstat
    );

    $dataArray[] = $newEntry;

    $updatedJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);

    file_put_contents('data.json', $updatedJsonData);

    echo "Data berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data. Form tidak lengkap.";
}

