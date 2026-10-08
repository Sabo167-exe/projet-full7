<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
    
}
$id = isset($_GET['console']) ? (int) $_GET['console'] : 0;

$stmt = $pdo->prepare('SELECT * FROM consoles WHERE id_console = :id');
$stmt->execute(['id' => $id]);
$console = $stmt->fetch(PDO::FETCH_ASSOC);
$description = $console['description'] ?? 'Aucune description disponible pour cette console.';
require __DIR__ . '/error404.php';

if (!$console) {
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
        <p class="error-message">Console introuvable</p>
        <a class="back-link" href="/FULL7">Retour à l\'accueil</a>
    </div>
    </body>
    ';

    exit;
} else {
    
    $stmt = $pdo->prepare('SELECT nom , annee_sortie, id_jeux FROM games WHERE id_console = :id');
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

<body class="page detail-console">

<?php include '../include/header.php'; ?>
<main class="main-detail-console">

    <h1 class="page-title">
        <?= htmlspecialchars($console['nom']) ?>
    </h1>
    <div class="console-detail">
        <img class="console-image" src="../img/console/<?= $id ?>.png" alt="<?= htmlspecialchars($console['nom']) ?>">
        <h2> description </h2>
        <p class="console-description"><?= htmlspecialchars($description) ?></p>
    </div>
    <section class="console-games">
        <h2 class="console-games-title">Jeux disponibles (<?= count($games) ?>)</h2>
        <?php if (empty($games)): ?>

        <p class="console-games-empty">Aucun jeu enregistré pour cette console.</p>
        <?php else: ?>
        <ul class="console-games-list">
        <?php foreach ($games as $game): ?>
            <a href="detailJeux.php?Games=<?php echo $game['id_jeux'] ?>" class="console-games-item">
                <span class="console-games-name"><?= htmlspecialchars($game['nom']) ?></span>
                <span class="console-games-year"><?= (int) $game['annee_sortie'] ?></span><br>
                
            </a>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </section>
            
</main>
            <?php include '../include/footer.php'; ?>
            <script src="js/toogleconsole.js" defer></script>
</body>