<?php /** @var \$this app\core\View */?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApsaCare - <?php echo $this->title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="header-contact">
            <div class="social">
                <p>Suivez-nous :</p>
                <a href="https://www.instagram.com/paips16.18/">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <nav>
                <ul class="social-nav">
                    <li>
                        <a href="mailto:contact@apsacare.fr">
                            <i class="fa-solid fa-envelope"></i>
                            contact@apsacare.fr
                        </a>
                    </li>
                    <li>
                        <a href="tel:0590464509">
                            <i class="fa-solid fa-phone"></i>
                            0590 464 509
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-sticky">
            <div class="logo">
                <img src="" alt="Logo ApsaCare">
            </div>
            <nav>
                <ul class="main-nav">
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/accompagnement">Notre accompagnement</a></li>
                    <li><a href="/formation">Nos formations</a></li>
                    <li><a href="/a-propos">Nous connaître</a></li>
                    <li><a href="/contact">Nous contacter</a></li>
                </ul>
            </nav>
        </div>
    </header>
    {{content}}
    <footer>

    </footer>
</body>
</html>
