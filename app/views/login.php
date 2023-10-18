<?php
/** @var \$this app\core\View */
$this->title = "Connexion";
?>
<main>
    <div class="main-container">
        <div class="text-center">
            <h1>Se <span class="text-highlight">connecter</span></h1>
            <img class="title-bottom" src="img/title-bottom.png" alt="" width="50">
        </div>
        <div class="login-container">
            <form action="/login" method="post">
                <div class="form-container">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control <?php echo $model->hasErrors('email') ? 'is-invalid' : ''; ?>" type="email" name="email" id="log-email">
                        <span class="invalid-feedback"><?php echo $model->getFirstError('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input class="form-control <?php echo $model->hasErrors('password') ? 'is-invalid' : ''; ?>" type="password" name="password" id="password">
                        <span class="invalid-feedback"><?php echo $model->getFirstError('password'); ?></span>
                    </div>
                </div>
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
</main>