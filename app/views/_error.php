<?php ?>
<link rel="stylesheet" href="../css/style.css">
<main>
    <div class="exception-container text-center">
        <h1>Erreur <span class="text-highlight"><?php echo $exception->getCode(); ?></span></h1>
        <img class="title-bottom" src="../img/title-bottom.png" width="50">
        <p><?php echo $exception->getMessage(); ?></p>
        <a href="/">Retour à la page d'accueil</a>
    </div>
</main>