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
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/GameBoy.png" alt="image GameBoy">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">GAME BOY</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/NES.png" alt="image NES">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">NES</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/nintendo/N64.png" alt="image Image N64">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">N64</h3>
            </div>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>

    <div class="page-collection-marque playstation">
        <h2>PlayStation</h2>
        <div class="page-collection-marque-consoles">
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/ps1.png" alt="image PS1">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS1</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/ps2.png" alt="image PS2">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS2</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/ps3.png" alt="image PS3">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PS3</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/playstation/pSP.png" alt="image PS1">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">PSP</h3>
            </div>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>

    <div class="page-collection-marque xbox">
        <h2>SEGA</h2>
        <div class="page-collection-marque-consoles">
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/MasterSystem.png" alt="image Xbox">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Master System</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/MegaDrive.png" alt="image Xbox">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Mega Drive</h3>
            </div>
            <div class="page-collection-marque-consoles-console">
                <img class="page-collection-marque-consoles-console-img" src="../img/console/SEGA/Saturn.png" alt="image Xbox">
                <p class="page-collection-marque-consoles-console-possesion">0/10</p>
                <h3 class="page-collection-marque-consoles-console-titre">Saturn</h3>
            </div>
        </div>
        <button class="page-collection-marque-show">▼</button>
    </div>
</div>

<?php include '../include/footer.php'; ?>


<script src="js/toogleconsole.js" defer></script>
</body>
</html>