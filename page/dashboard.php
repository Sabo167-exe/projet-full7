<?php   
session_start();
require_once 'connection/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
  
$pseudo = $_SESSION['pseudo'];

$nb_console = 4;
$progression = 58;
$sql= "
SELECT SUM(nb_jeux) AS nb_jeux_total, COUNT(console_id) AS nb_consoles
FROM (SELECT COUNT(g.id_jeux) AS nb_jeux , g.console_id
        FROM Ownerships AS o
        INNER JOIN Games AS g
        ON o.id_jeux = g.id_jeux
        WHERE o.id_user = :id_user
        GROUP BY g.console_id) AS jeux_consoles";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id_user' => $_SESSION['id_user']]);

$nb_jeux_consoles = $stmt->fetch(PDO::FETCH_ASSOC);

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
            <span class="stats-item-value"><?php echo $nb_jeux_consoles["nb_jeux_total"] ?></span>
            <p class="stats-item-label">Possédé</p>
        </div>

        <div class="stats-item">
            <span class="stats-item-value"><?php echo $nb_jeux_consoles["nb_consoles"] ?></span>
            <p class="stats-item-label">Nombre de console</p>
        </div>

        <div class="stats-item">
            <span class="stats-item-value"><?php echo $progression . "%" ?></span>
            <p class="stats-item-label">Progression totale</p>
        </div>

    </div>

    <?php include '../include/footer.php'; ?>
    <script src="js/script.js" defer></script>
</body>

</html>