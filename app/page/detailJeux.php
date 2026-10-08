<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
$id_jeu = isset($_GET['Games']) ? (int) $_GET['Games'] : 0;
$id_user = isset($_SESSION['id_user']);

$stmt = $pdo->prepare('SELECT * FROM games WHERE id_jeux = :id_jeu');
$stmt->execute(['id_jeu' => $id_jeu]);
$Game = $stmt->fetch(PDO::FETCH_ASSOC);
$description = $Game['description'] ?? 'Aucune description disponible pour cette console.';



if (!$Game) {
    http_response_code(404);
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404</title>
    </head>
    <body class="error-404-page">
    <div class="error-404">
        <h1 class="title-404">404</h1>
        <p class="error-message">jeu introuvable</p>
        <a class="back-link" href="/FULL7">Retour à l\'accueil</a>
    </div>
    </body>
    ';

    exit;
}

$stmt = $pdo->prepare('SELECT * FROM ownerships WHERE id_jeux = :id_jeux AND id_user = :id_user');
$stmt->execute(['id_jeux' => $id_jeu, 'id_user' => $id_user]);
$ownership = $stmt->fetch(PDO::FETCH_ASSOC);



if (isset( $_GET['delete']) && $ownership) {
    $stmt = $pdo->prepare('DELETE FROM ownerships WHERE id_user = :id_user AND id_jeux = :id_jeux');
    $stmt->execute(['id_jeux' => $id_jeu, 'id_user' => $id_user]);
    header("Location: detailJeux.php?Games=" . $id_jeu);
}
if (isset( $_GET['add']) && !$ownership) {
    $stmt = $pdo->prepare('INSERT INTO ownerships (id_user, id_jeux) VALUES (:id_user, :id_jeux)');
    $stmt->execute(['id_jeux' => $id_jeu, 'id_user' => $id_user]);
    header("Location: detailJeux.php?Games=" . $id_jeu);
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

<body class="page detail-console">

    <?php include '../include/header.php'; ?>
    <main class="main-detail-console">

        <h1 class="page-title">
            <?= htmlspecialchars($Game['nom']) ?>
        </h1>
        <div class="console-detail">
            <img class="console-image" src="../img/jeux/<?= $id_jeu ?>.jpg" alt="<?= htmlspecialchars($Game['nom']) ?>">
            <?php if ($ownership) :  ?>
                <p class="ownership-status">Vous possédez ce jeu</p>
                <a href="?Games=31&delete">
                    <div>
                        <p>retirer le jeu</p>
                    </div>
                </a>
            <?php else :  ?>
                <p class="ownership-status">Vous ne possédez pas ce jeu</p>
                <a href="?Games=<?php echo $id_jeu ?>&add">
                    <div>
                        <p>ajouter le jeu</p>
                    </div>
                </a>
            <?php endif ?>

            <h2> description </h2>
            <p class="console-description"><?= htmlspecialchars($description) ?></p>
        </div>
    </main>
    <?php include '../include/footer.php'; ?>
    <script src="js/toogleconsole.js" defer></script>
</body>