<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
    
}
$id = isset($_GET['c']) ? (int) $_GET['c'] : 0;

$stmt = $pdo->prepare('SELECT * FROM consoles WHERE id_console = :id');
$stmt->execute(['id' => $id]);
$console = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$console) {
    http_response_code(404);
    exit('Console introuvable');
} else {

    $stmt = $pdo->prepare('SELECT nom , annee_sortie FROM games WHERE id_console = :id');
    $stmt->execute(['id' => $id]);

    $games = [];
    while ($game = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $games[] = $game;
    }




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full7</title>
</head>

<body class="page">

<?php include '../include/header.php'; ?>
<main>
    <h1 class="page-title">
    <?= htmlspecialchars($console['nom']) ?>
    </h1>
    <img src="../img/console/<?= $id ?>.png" alt="<?= htmlspecialchars($console['nom']) ?>">

    <section class="console-games">
    <h2 class="console-games-title">Jeux disponibles (<?= count($games) ?>)</h2>

    <?php if (empty($games)): ?>
        <p class="console-games-empty">Aucun jeu enregistré pour cette console.</p>
    <?php else: ?>
        <ul class="console-games-list">
            <?php foreach ($games as $game): ?>
                <li class="console-games-item">
                    <span class="console-games-name"><?= htmlspecialchars($game['nom']) ?></span>
                    <span class="console-games-year"><?= (int) $game['annee_sortie'] ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>

</main>


