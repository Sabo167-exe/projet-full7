<?php

session_start();
require_once 'connection/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
$iduser = $_SESSION['id_user'];

$photo_profil = $_FILES['photo'];



if ($photo_profil) {
    $photoTmpName = $photo_profil["tmp_name"];
    $fileName = $photo_profil["name"];

    

    $arrayNameAndExtension = explode('.', $fileName);
    $fileExtension = end($arrayNameAndExtension);

    $newFileName = uniqid('', true).".".$fileExtension;

    
    $newFilePath = "../imgs/profil/". $newFileName;
    
    move_uploaded_file($photoTmpName, $newFilePath);

    echo $iduser;

    $sql = "UPDATE Users SET photo_profil = '$newFileName' WHERE id_user = $iduser";
    $pdo->exec($sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer la photo de profil</title>
</head>
<body class="page">

    <?php include '../include/header.php'; ?>

    <div class="profil-edit">

        <h1 class="page-title">Changer la photo de profil</h1>

        <div class="profil-edit-apercu">
            <img src="../img/autre/pfp.jpg" alt="photo de profil actuelle" class="profil-edit-apercu-img">
            <p class="profil-edit-apercu-label">Photo actuelle</p>
        </div>

        <form method="POST" enctype="multipart/form-data" class="profil-edit-form">
            <label for="photo" class="profil-edit-form-label">Choisir une nouvelle photo :</label>
            <input type="file" id="photo" name="photo" accept="image/*" class="profil-edit-form-input">
            <button type="submit" name="submit" class="profil-edit-form-btn">Enregistrer</button>
        </form>

    </div>

    <?php include '../include/footer.php'; ?>

    <script src="js/script.js" defer></script>
</body>
</html>