<?php 

$id_user = $_SESSION['id_user'];
$stmt = $pdo->prepare("SELECT photo_profil,pseudo FROM users WHERE id_user = :id_user");
$stmt->execute(['id_user' => $id_user]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$photo_profil = $user['photo_profil'];

?>

<header class="header">
    <img src="../img/logo/vlogo.png" alt="logo de full7" class="header-logo">
    <div class="header-droite">
    <nav class="header-droite-nav">
        <button class="theme-toggle" id="themeToggle" title="Changer le thème">🌙</button>
        <a href="../page/dashboard.php">Acceuil</a>
        <a href="../page/collection.php">Collection</a>
        <a href="../page/connection/deconnexion.php">déconnexion</a>

    </nav>
    <a href="profil.php"><img src="../img/profil/<?php echo $photo_profil ?>" alt="pfp vide" class="header-droite-img"></a>
    </div>
</header>