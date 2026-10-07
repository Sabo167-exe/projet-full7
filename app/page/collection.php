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

    <div class="page-collection-marque nintendo">
        <h2>Nintendo</h2>
        <div class="page-collection-marque-consoles">
            <a href="detail-console.php?c=4" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/4.png" alt="image GameBoy">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">GAME BOY</h3>
            </a>
            <a href="detail-console.php?c=5" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/5.png" alt="image NES">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">NES</h3>
            </a>
            <a href="detail-console.php?c=6" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/6.png" alt="image N64">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">N64</h3>
            </a>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>

    <div class="page-collection-marque playstation">
        <h2>PlayStation</h2>
        <div class="page-collection-marque-consoles">
            <a href="detail-console.php?c=1" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/1.png" alt="image PS1">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS1</h3>
            </a>
            <a href="detail-console.php?c=2" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/2.png" alt="image PS2">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS2</h3>
            </a>
            <a href="detail-console.php?c=3" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/3.png" alt="image PS3">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS3</h3>
            </a>
            <a href="detail-console.php?c=10" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/10.png" alt="image PSP">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PSP</h3>
            </a>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>

    <div class="page-collection-marque xbox">
        <h2>SEGA</h2>
        <div class="page-collection-marque-consoles">
            <a href="detail-console.php?c=7" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/7.png" alt="image Master System">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Master System</h3>
            </a>
            <a href="detail-console.php?c=8" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/8.png" alt="image Mega Drive">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Mega Drive</h3>
            </a>
            <a href="detail-console.php?c=9" class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/9.png" alt="image Saturn">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Saturn</h3>
            </a>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>
</div>

<?php include '../include/footer.php'; ?>


<script src="js/toogleconsole.js" defer></script>
</body>
</html>