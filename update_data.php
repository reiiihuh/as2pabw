<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonString = file_get_contents('data.json');

    $data = json_decode($jsonString, true);

    $idToUpdate = $_POST['id'];
    $newemail = $_POST['sso'];
    $newnama = $_POST['nama'];
    $newnim = $_POST['nim'];
    $newusn = $_POST['usn'];
    $newpassword = $_POST['pwd'];
    $newtanggalaktif = $_POST['tanggalaktif'];
    $newstat = $_POST['stat'];

    foreach ($data as $key => &$project) {
        if ($project['id'] == $idToUpdate) {
            $project['sso'] = $newemail;
            $project['nama'] = $newnama;
            $project['nim'] = $newnim;
            $project['usn'] = $newusn;
            $project['pwd'] = $newpassword;
            $project['tanggalaktif'] = $newtanggalaktif;
            $project['stat'] = $newstat;
            break;
        }
    }

    $updatedJsonString = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents('data.json', $updatedJsonString);

    header('Location: index.php');
    exit();
}
?>
