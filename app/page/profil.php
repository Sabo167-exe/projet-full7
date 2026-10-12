<?php
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
$iduser = $_SESSION['id_user'];
$pseudo = $_SESSION['pseudo'];
$photo_profil = $_FILES['photo'];



if ($photo_profil) {
    $photoTmpName = $photo_profil["tmp_name"];
    $fileName = $photo_profil["name"];

    

    $arrayNameAndExtension = explode('.', $fileName);
    $fileExtension = end($arrayNameAndExtension);

    $newFileName = uniqid('', true).".".$fileExtension;

    
    $newFilePath = "../img/profil/". $newFileName;
    

    $ancienne = $pdo->query("SELECT photo_profil FROM users WHERE id_user = $iduser")->fetchColumn();

    move_uploaded_file($photoTmpName, $newFilePath);

    

    $sql = "UPDATE users SET photo_profil = '$newFileName' WHERE id_user = $iduser";
    $pdo->exec($sql);

    if ($ancienne && file_exists("../img/profil/" . $ancienne) && $ancienne !== 'base.jpeg') {
        unlink("../img/profil/" . $ancienne);
    }




} 

if (isset($_POST['pseudo']) && $_POST['pseudo'] !== '') {
    $new_pseudo = $_POST['pseudo'];

    $sql2 = "UPDATE users SET pseudo = '$new_pseudo' WHERE id_user = $iduser";
    $pdo->exec($sql2);

    $_SESSION['pseudo'] = $new_pseudo;
}

$pseudo = $_SESSION['pseudo'];
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
            <img src="../img/profil/<?php echo $photo_profil ?>" alt="photo de profil actuelle" class="profil-edit-apercu-img">
            <p class="profil-edit-apercu-label">Photo actuelle</p>
        </div>

        <form method="POST" enctype="multipart/form-data" class="profil-edit-form">
            <label for="photo" class="profil-edit-form-label">Choisir une nouvelle photo :</label>
            <input type="file" id="photo" name="photo" accept="image/*" class="profil-edit-form-input">
            <button type="submit" name="submit" class="profil-edit-form-btn">Enregistrer</button>
        </form>
        <form method="POST" enctype="multipart/form-data" class="profil-edit-form">
            <label for="pseudo">choisir un nouveau pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="pseudo actuel <?php echo $pseudo ?>">
            <button type="submit" name="submit" class="profil-edit-form-btn">Enregistrer</button>

        </form>
    </div>

    <?php include '../include/footer.php'; ?>

    <script src="js/script.js" defer></script>
</body>
</html>