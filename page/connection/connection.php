<?php
session_start();

// Si déjà connecté, rediriger
if (isset($_SESSION['id_user'])) {
    header('Location: ../dashboard.php');
    exit;
}

require_once 'db.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $mdp    = $_POST['mdp'] ?? '';

    if (empty($pseudo) || empty($mdp)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT id_user, pseudo, mdp FROM Users WHERE pseudo = :pseudo LIMIT 1");
        $stmt->execute([':pseudo' => $pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['mdp'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['pseudo']  = $user['pseudo'];
            header('Location: ../index.php');
            exit;
        } else {
            $erreur = "Pseudo ou mot de passe incorrect.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="page page_connection">

    <div class="form">
        <h1 class="form_title">Connexion</h1>

        <?php if ($erreur): ?>
            <p class="form_error"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form class="form_body" method="POST" action="connection.php">
            <div class="form_group">
                <label class="form_label" for="pseudo">Pseudo :</label>
                <input class="form_input" type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>" required>
            </div>

            <div class="form_group">
                <label class="form_label" for="mdp">Mot de passe :</label>
                <input class="form_input" type="password" id="mdp" name="mdp" required>
            </div>

            <button class="form_button" type="submit">Se connecter</button>
        </form>

        <p class="form_link">
            Pas encore de compte ? <a class="form_link-action" href="inscription.php">S'inscrire</a>
        </p>
    </div>

</body>
</html>