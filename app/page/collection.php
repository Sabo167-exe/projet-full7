<?php   
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
}
$sql = 'SELECT 
	c.id_console,
	c.nom,
	c.marque,
	COUNT(o.id_user) as nb_jeux_possedes,
	COUNT(g.id_jeux) as nb_jeux_total
	
	

FROM games g 
INNER JOIN consoles c 
ON g.id_console = c.id_console 
LEFT JOIN ownerships o 
ON g.id_jeux = o.id_jeux 

WHERE o.id_user = :id_user OR o.id_user IS NULL
GROUP BY c.id_console

';

$stmt = $pdo->prepare($sql);
$stmt->execute([':id_user' => $_SESSION['id_user']]);

$nb_jeux_consoles = $stmt->fetchall();

$sql2 = '   SELECT 
                marque 
            FROM 
                consoles
            GROUP BY
                marque
';

$stmt = $pdo->prepare($sql2);
$stmt->execute();
$liste_marques_console = $stmt->fetchall();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Collection</title>
</head>
<body class="page">



<?php include '../include/header.php'; ?> 

<div class="page-collection">
    <h1 class="page-collection-title">Ma collection <a href="addcolection.php" class="btn-add"><span class="page-collection-title-btn">+</span></a></h1>
 
    <?php foreach ($liste_marques_console as $marque_console) :?>

        <div class="page-collection-marque <?=  $marque_console["marque"] ?>?>">
            <h2><?=  $marque_console["marque"] ?></h2>
            <div class="page-collection-marque-consoles">
                <?php foreach ($nb_jeux_consoles as $nb_jeux_console) :?>
                    <?php if ($nb_jeux_console["marque"] === $marque_console["marque"] ):?>
                    <a href="detail-console.php?console=<?= $nb_jeux_console["id_console"] ?> >" class="page-collection-marque-consoles-console">
                        <img class="page-collection-marque-consoles-console-img" src="../img/console/<?= $nb_jeux_console["id_console"] ?>.png" alt="image GameBoy">
                        <span class="span-possession">
                            <p class="page-collection-marque-consoles-console-possesion"><?= $nb_jeux_console["nb_jeux_possedes"] ."/". $nb_jeux_console["nb_jeux_total"] ?></p>
                            <?php if ($nb_jeux_console["nb_jeux_total"] == $nb_jeux_console["nb_jeux_possedes"]):?>
                            <p class="page-collection-marque-consoles-console-possesion">Full7</p>
                            </span>
                        <?php endif?>
                        <h3 class="page-collection-marque-consoles-console-titre"><?= $nb_jeux_console["nom"] ?></h3>
                    </a>           
                    <?php endif?>
                <?php endforeach?>
                
                
            </div>
            <button class="page-collection-marque-show">▼</button>
        </div>
    <?php endforeach?>


<?php include '../include/footer.php'; ?>


<script src="js/toogleconsole.js" defer></script>
</body>
</html>