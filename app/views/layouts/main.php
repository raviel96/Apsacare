<?php /** @var \$this app\core\View */?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApsaCare - <?php echo $this->title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="scroll-to-top center"><i class="fa-solid fa-angle-up"></i></a>
    <header>
        <div class="header-contact center text-center">
            <div class="social center">
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
            <div class="logo center">
                <a href="/">
                    <img src="/img/logo.jpg" alt="Logo ApsaCare" width="150" height="100">
                </a>
            </div>
            <div class="menu center text-center">
                <div class="menu-container">
                    <div class="mobile-menu center">
                        <p>Menu</p>
                        <i class="fa-solid fa-bars"></i>   
                    </div>
                    <nav>
                        <ul class="main-nav center">
                            <li><a href="/">Accueil</a></li>
                            <li><a href="/accompagnement">Notre accompagnement</a></li>
                            <li><a href="/formation">Nos formations</a></li>
                            <li><a href="/a-propos">Nous connaître</a></li>
                            <li><a href="/contact">Nous contacter</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    {{content}}
    <footer>
        <div class="footer-container">
            <div class="link-container">
                <h3 class="link-container-title">A PROPOS</h3>
                <div class="link-container-content">
                    <p>APSA CARE</p>
                    <p>Une association au service de l'inclusion sociale et professionnelle</p>
                </div>
            </div>
            <div class="link-container">
                <h3 class="link-container-title">CONTACTEZ-NOUS</h3>
                <div class="link-container-content">
                    <p>Téléphone : <a href="tel:0590464509">0590 464 509</a></p>
                    <p>Email : <a href="mailto:contact@apsacare.fr">contact@apsacare.fr</a></p>
                    <p>Adresse : 41 Rue du Chevalier Vicomte de Bragelogne</p>
                    <p>Suivez-nous : 
                        <a href="https://www.instagram.com/paips16.18/">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </p>
                </div>
            </div>
            <div class="link-container">
                <h3 class="link-container-title">NOTRE ACCOMPAGNEMENT</h3>
                <div class="link-container-content">
                    <nav>
                        <ul class="footer-nav">
                            <li><a href="/accompagnement#individu">L'individu</a></li>
                            <li><a href="/accompagnement#appui-social">Appui social</a></li>
                            <li><a href="/accompagnement#appui-professionnel">Appui professionnel</a></li>
                            <li><a href="/accompagnement#appui-psychologique">Apui psychologique</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="link-container">
                <h3 class="link-container-title">LIENS RAPIDES</h3>
                <div class="link-container-content">
                    <a href="/cgu">Mentions légales</a>
                </div>
            </div>
        </div>
        <div class="footer-copy text-center">
            <p>&copy; 2023 <strong>APSA CARE</strong></p>
        </div>
    </footer>
    <script  src="/js/script.js"></script>
</body>
</html>
