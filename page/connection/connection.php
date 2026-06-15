<?php
session_start();

// Si déjà connecté, rediriger
if (isset($_SESSION['id_user'])) {
    header('Location: ../index.php');
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
</head>
<body>

<h1>Connexion</h1>

<?php if ($erreur): ?>
    <p><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<form method="POST" action="connection.php">
    <label for="pseudo">Pseudo :</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>" required><br><br>

    <label for="mdp">Mot de passe :</label><br>
    <input type="password" id="mdp" name="mdp" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<br>
<p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>

</body>
</html>
