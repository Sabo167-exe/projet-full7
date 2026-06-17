<?php 

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
 
        <form action="pdp.php" method="POST" enctype="multipart/form-data" class="profil-edit-form">
            <label for="photo" class="profil-edit-form-label">Choisir une nouvelle photo :</label>
            <input type="file" id="photo" name="photo" accept="image/*" class="profil-edit-form-input">
            <button type="submit" class="profil-edit-form-btn">Enregistrer</button>
        </form>
 
    </div>
 
    <?php include '../include/footer.php'; ?>
 
    <script src="js/script.js" defer></script>
</body>
</html>
 