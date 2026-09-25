<?php
session_start();

// Si déjà connecté, rediriger
if (isset($_SESSION['id_user'])) {
    header('Location: dashboard.php');
    exit;
}

require_once 'db.php';

$erreur  = '';
$succes  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $mdp    = $_POST['mdp'] ?? '';
    $mdp2   = $_POST['mdp2'] ?? '';

    // Validations
    if (empty($pseudo) || empty($email) || empty($mdp) || empty($mdp2)) {
        $erreur = "Veuillez remplir tous les champs.";
    } elseif (strlen($pseudo) > 25) {
        $erreur = "Le pseudo ne doit pas dépasser 25 caractères.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "L'adresse email n'est pas valide.";
    } elseif ($mdp !== $mdp2) {
        $erreur = "Les mots de passe ne correspondent pas.";
    } elseif (strlen($mdp) < 6) {
        $erreur = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        // Vérifier si le pseudo existe déjà
        $stmt = $pdo->prepare("SELECT id_user FROM Users WHERE pseudo = :pseudo LIMIT 1");
        $stmt->execute([':pseudo' => $pseudo]);
        if ($stmt->fetch()) {
            $erreur = "Ce pseudo est déjà utilisé.";
        } else {
            // Vérifier si l'email existe déjà
            $stmt = $pdo->prepare("SELECT id_user FROM Users WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $erreur = "Cette adresse email est déjà utilisée.";
            } else {
                // Insertion
                $hash = password_hash($mdp, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO Users (pseudo, email, mdp) VALUES (:pseudo, :email, :mdp)");
                $stmt->execute([
                    ':pseudo' => $pseudo,
                    ':email'  => $email,
                    ':mdp'    => $hash,
                ]);
                $succes = "Compte créé avec succès ! Vous pouvez vous connecter.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../../cssold/oldstyle.css">
</head>
<body class="page">

<h1 class="form_title">Inscription</h1>

<?php if ($erreur): ?>
    <p class="form_error"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<?php if ($succes): ?>
    <p class="form_success"><?= htmlspecialchars($succes) ?></p>
    <p class="form_link"><a class="form_link-action" href="connection.php">Se connecter</a></p>
<?php else: ?>

<form class="form_body" method="POST" action="inscription.php">
    <div class="form_group">
        <label class="form_label" for="pseudo">Pseudo (max 25 caractères) :</label><br>
        <input class="form_input" type="text" id="pseudo" name="pseudo" maxlength="25" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>" required><br><br>
    </div>

    <div class="form_group">
        <label class="form_label" for="email">Adresse email :</label><br>
        <input class="form_input" type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br><br>
    </div>

    <div class="form_group">
        <label class="form_label" for="mdp">Mot de passe (min 6 caractères) :</label><br>
        <input class="form_input" type="password" id="mdp" name="mdp" required><br><br>
    </div>

    <div class="form_group">
        <label class="form_label" for="mdp2">Confirmer le mot de passe :</label><br>
        <input class="form_input" type="password" id="mdp2" name="mdp2" required><br><br>
    </div>

    <button class="form_button" type="submit">S'inscrire</button>
</form>

<?php endif; ?>

<br>
<p class="form_link">Déjà un compte ? <a class="form_link-action" href="connection.php">Se connecter</a></p>

</body>
</html>