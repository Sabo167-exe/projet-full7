<?php   
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
  
$pseudo = $_SESSION['pseudo'];

// Nombre de jeux possédés et nombre de consoles où l'utilisateur a au moins un jeu
$sql= "
SELECT SUM(nb_jeux) AS nb_jeux_total, COUNT(id_console) AS nb_consoles
FROM (SELECT COUNT(g.id_jeux) AS nb_jeux , g.id_console
        FROM ownerships AS o
        INNER JOIN games AS g
        ON o.id_jeux = g.id_jeux
        WHERE o.id_user = :id_user
        GROUP BY g.id_console) AS jeux_consoles";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id_user' => $_SESSION['id_user']]);

$nb_jeux_consoles = $stmt->fetch(PDO::FETCH_ASSOC);

// SUM() renvoie NULL si l'utilisateur ne possède aucun jeu, on force donc 0
$nb_possedes = (int) ($nb_jeux_consoles['nb_jeux_total'] ?? 0);
$nb_consoles = (int) ($nb_jeux_consoles['nb_consoles'] ?? 0);

// Nombre total de jeux dans la base
$nb_total_jeux = (int) $pdo->query("SELECT COUNT(*) FROM games")->fetchColumn();

// Pourcentage de jeux possédés par rapport au nombre total de jeux
$progression = $nb_total_jeux > 0
    ? round($nb_possedes / $nb_total_jeux * 100)
    : 0; // évite la division par zéro

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
<?php echo " jeux dispo $nb_total_jeux "?>
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