<?php   
session_start();
require_once 'connection/db.php';

$pseudo = $_SESSION['pseudo'];

$nb_console = 4;
$progression = 58;
$stmt = $pdo->prepare("SELECT COUNT(id_jeux) AS nbJeux FROM Ownerships WHERE id_user = :id_user");
$stmt->execute([':id_user' => $_SESSION['id_user']]);
$nbJeux = [];

$nbJeux = $stmt->fetch(PDO::FETCH_ASSOC);
$possedé = $nbJeux['nbJeux'];
var_dump($nbJeux);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>







<body class="page">

    <?php include '../include/header.php'; ?>

    <h1 class="page-title">
        <?php echo "bonjour $pseudo"; ?>
    </h1>

    <div class="stats">

        <div class="stats-item">
            <span class="stats-item-value"><?php echo $possedé ?></span>
            <p class="stats-item-label">Possédé</p>
        </div>

        <div class="stats-item">
            <span class="stats-item-value"><?php echo $nb_console ?></span>
            <p class="stats-item-label">Nombre de console</p>
        </div>

        <div class="stats-item">
            <span class="stats-item-value"><?php echo $progression . "%" ?></span>
            <p class="stats-item-label">Progression totale</p>
        </div>

    </div>

    <?php include '../include/footer.php'; ?>

</body>

</html>